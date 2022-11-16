<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create | Event</title>
</head>

<body>
   <center>
        <h1>Add new EVENT</h1>
    <form action="{{route('event.store')}}" method="post"  enctype="multipart/form-data">
       {{@csrf_field()}}
        <table>
            <tr>
                <td><strong>Event Name</strong></td>
                <td><input type="text" name="eventName" required></td>
            </tr>
            <tr>
                <td><strong>Event Details</strong></td>
                <td><textarea name="eventDetails" cols="30" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td><strong>Event Importance</strong></td>
                <td>
                    <select name="importance">
                        <option value="high">high</option>
                        <option value="moderate">moderate</option>
                        <option value="less important">less important</option>

                    </select>
                </td>
            </tr>
            <tr>
                <label>Insert Image</label>
                <td><input type="file" name="image"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="SUBMIT"></td>
            </tr>
        </table>
         <a href="{{route('home.index')}}">back</a> |
    </form>
   </center>
</body>

</html>
