@if (Request::is('profile/*'))
<li>
    <button type="button" class="btn btn-light" style ="margin-top:8px"> <a href="{{route('home')}}">Home</a></button>

</li>
@endif


<li class="dropdown direct-messages-notification">
    <a href="#" class="dropdown-toggle parent" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-commenting"></i>
    </a>

     <ul class="dropdown-menu" role="menu">
             <li style="padding: 10px"><a href="javascript:;">There is no messages.</a></li>
       
    </ul>

</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle parent" data-toggle="dropdown" role="button" aria-expanded="false">
         <i class="fa fa-bell"></i>
    </a>
    <ul class="dropdown-menu" role="menu">
             <li style="padding: 10px"><a href="javascript:;">There is no notification.</a></li>
       
    </ul>
</li>