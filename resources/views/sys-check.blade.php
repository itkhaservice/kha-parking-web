<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kha-Parking | System Health Check</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-mono text-sm">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
        <div class="bg-gray-800 p-6 text-white flex justify-between items-center">
            <h1 class="text-xl font-bold uppercase tracking-widest"><i class="fas fa-stethoscope mr-2"></i>Kiem tra He Thong</h1>
            <span class="bg-green-500 px-3 py-1 rounded text-xs">V.1.0</span>
        </div>
        
        <div class="p-6 space-y-4">
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b-2 border-gray-100 uppercase text-gray-500 text-xs">
                        <th class="py-3">Thanh phan</th>
                        <th class="py-3">Hien tai</th>
                        <th class="py-3">Yeu cau</th>
                        <th class="py-3 text-right">Ket qua</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($checks as $name => $check)
                    <tr>
                        <td class="py-4 font-bold">{{ $name }}</td>
                        <td class="py-4">{{ $check['value'] }}</td>
                        <td class="py-4 text-gray-400 italic text-xs">{{ $check['req'] }}</td>
                        <td class="py-4 text-right">
                            @if($check['status'])
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold">PASS</span>
                            @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-bold">FAIL</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-gray-50 p-6 flex justify-between items-center border-t">
            <p class="text-gray-500">Neu tat ca deu <span class="text-green-600 font-bold">PASS</span>, he thong san sang hoat dong.</p>
            <a href="/" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">Vao Dashboard</a>
        </div>
    </div>
</body>
</html>
