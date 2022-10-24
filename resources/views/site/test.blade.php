<h2>asdasdasdasdads</h2>



@foreach($cars as $row)
    <div>
        {{$row->category->title_ar}}<br>
        {{$row->price}}
        <img src="{{asset($row->image)}}">
    </div>
@endforeach
