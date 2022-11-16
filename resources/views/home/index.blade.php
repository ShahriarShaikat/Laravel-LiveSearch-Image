<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Page</title>
</head>
<body>
  <br><br> 
   <center> 
    <h1>Welcome home, {{session('username')}}</h1>
    <br><br>
    
    
    <table border="1">
        <tr>
            <th>Event Name</th>
            <th>Event Details</th>
            <th>Importance</th>
            <th>Image</th>
        </tr>

        @foreach($events as $event)
        <tr>
            <td><a href="{{route('event.show',[$event->id])}}"> {{$event->event_name}}</a></td>
            
            <td>{{$event->event_details}}</td>
            <td>{{$event->importance}}</td>
            <td><img src="{{asset('uploads/event/' .$event->image) }}" alt="image" height="100" width="100"></td>
        </tr>
        @endforeach
    
    </table>
    <br><br>
    <a href="{{route('user.create')}}">Add New Event</a> |

   
    <a href="{{route('logout.index')}}">Logout</a> 
   </center>
</body>
</html>