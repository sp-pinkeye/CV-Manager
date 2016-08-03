<!-- resources/views/qualification/partial/show.blade.php -->

            <table>
                <tr>
                    <th>Level</th>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
                @foreach( $education->qualifications as $qualification )
                <tr>
                    <td>{{ $qualification->level }}</td>
                    <td>{{ $qualification->subject }}</td>
                    <td>{{ $qualification->grade }}</td>
                </tr>
                @endforeach
            </table>
