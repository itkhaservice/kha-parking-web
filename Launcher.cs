using System;
using System.Diagnostics;
using System.Drawing;
using System.IO;
using System.Net;
using System.Net.Sockets;
using System.Windows.Forms;
using System.Threading;

namespace KhaParkingLauncher
{
    public class SysTrayApp : Form
    {
        private NotifyIcon trayIcon;
        private ContextMenu trayMenu;
        private Process phpProcess;
        private Process nodeProcess;
        private string port = "8000";
        private string phpPath = @"bin\php\php.exe";

        [STAThread]
        public static void Main()
        {
            Application.Run(new SysTrayApp());
        }

        public SysTrayApp()
        {
            // 1. Khoi tao Menu
            trayMenu = new ContextMenu();
            trayMenu.MenuItems.Add("Mở KHA PARKING", OnOpenWeb);
            trayMenu.MenuItems.Add("-");
            trayMenu.MenuItems.Add("Khởi động lại Server", OnRestart);
            trayMenu.MenuItems.Add("Thoát hệ thống", OnExit);

            // 2. Khoi tao Icon
            trayIcon = new NotifyIcon();
            trayIcon.Text = "KHA PARKING - Dang chay...";
            
            if (File.Exists("favicon.ico")) 
            {
                try { trayIcon.Icon = new Icon("favicon.ico"); } 
                catch { trayIcon.Icon = SystemIcons.Application; }
            }
            else 
            {
                trayIcon.Icon = SystemIcons.Application;
            }

            trayIcon.ContextMenu = trayMenu;
            trayIcon.Visible = true;
            trayIcon.DoubleClick += OnOpenWeb;

            // 3. Bat dau chay he thong
            StartSystem();
        }

        protected override void OnLoad(EventArgs e)
        {
            Visible = false;
            ShowInTaskbar = false;
            base.OnLoad(e);
        }

        private void StartSystem()
        {
            StopSystem();

            string rootDir = AppDomain.CurrentDomain.BaseDirectory;
            string fullPhpPath = Path.Combine(rootDir, phpPath);

            if (!File.Exists(fullPhpPath))
            {
                MessageBox.Show("Lỗi: Không tìm thấy PHP tại " + fullPhpPath, "Lỗi hệ thống", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }

            // --- 1. Chay PHP Server (Dung string.Format thay cho $) ---
            ProcessStartInfo phpStart = new ProcessStartInfo();
            phpStart.FileName = fullPhpPath;
            phpStart.Arguments = string.Format("-S 0.0.0.0:{0} server.php", port);
            phpStart.WindowStyle = ProcessWindowStyle.Hidden;
            phpStart.CreateNoWindow = true;
            phpStart.UseShellExecute = false;
            phpStart.WorkingDirectory = rootDir;
            
            try 
            {
                phpProcess = Process.Start(phpStart);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Không thể khởi động PHP: " + ex.Message);
            }

            // --- 2. Chay Node (Vite) ---
            ProcessStartInfo nodeStart = new ProcessStartInfo();
            nodeStart.FileName = "cmd.exe";
            nodeStart.Arguments = "/c npm run dev";
            nodeStart.WindowStyle = ProcessWindowStyle.Hidden;
            nodeStart.CreateNoWindow = true;
            nodeStart.UseShellExecute = false;
            nodeStart.WorkingDirectory = rootDir;

            try 
            {
                nodeProcess = Process.Start(nodeStart);
            }
            catch { }

            // Hien thong bao (Sua loi xuong dong va dau $)
            trayIcon.BalloonTipTitle = "KHA PARKING";
            trayIcon.BalloonTipText = "Hệ thống đã khởi động tại Port " + port + ".\nClick đúp để mở.";
            trayIcon.ShowBalloonTip(3000);
        }

        private void StopSystem()
        {
            try 
            {
                if (phpProcess != null && !phpProcess.HasExited) 
                {
                    phpProcess.Kill();
                    phpProcess = null;
                }
                
                ProcessStartInfo killNode = new ProcessStartInfo();
                killNode.FileName = "taskkill";
                killNode.Arguments = "/F /IM node.exe /T";
                killNode.CreateNoWindow = true;
                killNode.UseShellExecute = false;
                Process.Start(killNode).WaitForExit();
            } 
            catch { }
        }

        private void OnOpenWeb(object sender, EventArgs e)
        {
            string url = "http://localhost:" + port;
            
            try 
            {
                using (Socket socket = new Socket(AddressFamily.InterNetwork, SocketType.Dgram, 0))
                {
                    socket.Connect("8.8.8.8", 65530);
                    IPEndPoint endPoint = socket.LocalEndPoint as IPEndPoint;
                    url = "http://" + endPoint.Address.ToString() + ":" + port;
                }
            }
            catch { }

            Process.Start(new ProcessStartInfo(url) { UseShellExecute = true });
        }

        private void OnRestart(object sender, EventArgs e)
        {
            StartSystem();
        }

        private void OnExit(object sender, EventArgs e)
        {
            StopSystem();
            trayIcon.Visible = false;
            Application.Exit();
        }
    }
}
