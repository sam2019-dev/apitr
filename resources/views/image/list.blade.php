<ul>
@if($images)
  @foreach($images as $image)
     <li> {{ $image->imagename }} - <img src="{{ asset('images/uploaded/demo/'.$image->imageurl) }}" > </li>
  @endforeach
@endif
</ul>