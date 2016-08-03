<!-- resources/views/qualification/show.blade.php -->

            <table>
                <tr>
                    <th>Level</th>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
                @foreach( $qualifications as $qualification )
                <tr>
                    <td>{{ $qualification->level }}</td>
                    <td>{{ $qualification->subject }}</td>
                    <td>{{ $qualification->grade }}</td>
                </tr>
                @endforeach
            </table>
