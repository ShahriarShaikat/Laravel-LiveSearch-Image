<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('live_search');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
                $output = '';
                $query = $request->get('query');

                if($query != '')
                {
                 $data = DB::table('live_user')
                   ->where('UserName', 'like', '%'.$query.'%')
                   ->orWhere('Address', 'like', '%'.$query.'%')
                   ->orWhere('City', 'like', '%'.$query.'%')
                   ->orWhere('PostalCode', 'like', '%'.$query.'%')
                   ->orWhere('Country', 'like', '%'.$query.'%')
                   ->orderBy('UserID', 'desc')
                   ->get();
                   
                }

                else
                {
                 $data = DB::table('live_user')
                   ->orderBy('UserID', 'desc')
                   ->get();
                }
                
                $total_row = $data->count();
                if($total_row > 0)
                {
                       foreach($data as $row)
                       {
                        $output .= '
                        <tr>
                         <td>'.$row->UserName.'</td>
                         <td>'.$row->Address.'</td>
                         <td>'.$row->City.'</td>
                         <td>'.$row->PostalCode.'</td>
                         <td>'.$row->Country.'</td>
                        </tr>
                        ';
                       }
                }
                else
                {
                       $output = '
                       <tr>
                        <td align="center" colspan="5">No Data Found</td>
                       </tr>
                       ';
                }
                $data = array(
                 'table_data'  => $output,
                 'total_data'  => $total_row
                );

                echo json_encode($data);
       }
    }
}