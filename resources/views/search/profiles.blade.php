
@if (isset($search) && is_object($search))
 @foreach($search as $nick)

<a href="http://instagram.open/nick/{{$nick->nick}}">
    <div class="user-list flex">
        <img class="inline object-cover w-12 h-12 mr-2 rounded-full" src="{{asset($nick->image)}}"/>
        <span>
            <p class="">{{$nick->nick}}</p>
            <p class="text-gray-500">{{$nick->name}}</p>
        </span>
    </div>
</a>




 @endforeach

@else
<div class="user-list flex">
    <p>{{$search}}</p>
</div>
@endif
