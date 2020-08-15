@extends('layouts.app')

@section('content')
<table border="1" width="80%" align="center">
    <tr>
        <td>
            Region
        </td>
        <td>
            Site
        </td>
        <td>
            WTG PAD
        </td>
        <td>
            Category
        </td>
        <td>
            Sub-cat
        </td>
        <td>
            Check Point
        </td>
        <td>
            Description
        </td>
        <td>
            Priority
        </td>
        <td>
            Catalogue
        </td>
        <td>
            code
        </td>
        <td>
            QTY
        </td>
        <td>
            Comments
        </td>					 		 		
    </tr>
    @foreach($sites as $site)
        @foreach($site->checkpoints()->whereNotNull('code')->get() as $checkpoint)
            <tr>
                <td>
                    {{ $site->region }}
                </td>
                <td>
                    {{ $site->site }}
                </td>
                <td>
                    {{ $site->pad }}
                </td>
                <td>
                    
                </td>
                <td>
                    {{ $checkpoint->subcat }}
                </td>
                <td>
                    {{ $checkpoint->checkpoint }}
                </td>
                <td>
                    
                </td>
                 <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    {{ $checkpoint->code }}
                </td>
                <td>
                    
                </td>
                <td>
                    {{ $checkpoint->subcat }} - {{ $checkpoint->comment }}
                </td>					 		 		
            </tr>
        @endforeach
    @endforeach

</table>
@endsection

