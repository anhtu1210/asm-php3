@extends('admin.layouts.master')

@section('title')
    Xem chi tiết Banner {!! $banner->title !!}
@endsection

@section('content')
    <table>
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>

        @foreach($banner->toArray() as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>
                    @php
                        if ($key == 'image') {
                            $url = \Storage::url($value);

                            echo "<img src=\"$url\" alt=\"\" width=\"50px\">";

                        } elseif (\Illuminate\Support\Str::contains($key, 'is_')) {
                            echo $value
                                    ? '<span class="badge bg-primary">YES</span>'
                                          : '<span class="badge bg-danger">NO</span>';
                        } else {
                            echo $value;
                        }
                    @endphp

                </td>
            </tr>
        @endforeach
    </table>
@endsection
