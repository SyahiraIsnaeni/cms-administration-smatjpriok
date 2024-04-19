<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Jadwal Mata Pelajaran</h1>

    <table class="table table-bordered">
        <thread>
            <tr>Hari</tr>
            <tr>Mata Pelajaran</tr>
            <tr>Guru</tr>
            <tr>Jam Mulai</tr>
            <tr>Jam Selesai</tr>
        <thread>
        <tbody>
            @forelse ($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->day->name }}</td>
                <td>{{ $jadwal->mapel->nama }} {{ $jadwal->mapel->kelas->nama_kelas }}</td>
                <td>{{ $jadwal->guru->nama }}</td>
                <td>{{ $jadwal->start_time ? substr($jadwal->start_time, 0, 5) : '' }}</td>
                <td>{{ $jadwal->end_time ? substr($jadwal->end_time, 0, 5) : '' }}</td>
                <td>
            </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>