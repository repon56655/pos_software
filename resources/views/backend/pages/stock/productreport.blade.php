@extends('backend.mastaring.master')
    @section('majid')
        <h1 class="text-center" style="display:none">Summary Report</h1>
        <table class="table bg" border="1">
            <thead class="thead">
                <tr>
                    <th>Branch Name</th>
                    <th>Branch Manager Name</th>
                    <th>Product Name</th>
                    <th>Cost Price</th>
                    <th>Sales Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php $sum=0; ?>
                @foreach ($stock as $stock)
                <tr>
                    <td>{{ $stock->brinfo->name }}</td>
                    <td>{{ $stock->brinfo->manager }}</td>
                    <td>{{ $stock->prinfo->name }}</td>
                    <td>{{ $stock->prinfo->cost_price }}</td>
                    <td>{{ $stock->prinfo->sale_price }}</td>
                    <td>{{ $stock->quantity }}</td>
                </tr>
                <?php $sum =$sum + $stock->quantity; ?>
                @endforeach
                <tr>
                    <td colspan="6" class="text-right">{{ $sum }}</td>
                </tr>
            </tbody>
        </table>
        <button onclick="window.print()" class="btn btn-info"><i class="fa fa-print"></i></button>
        <style>
            @media print{
                .btn, .ion-ios-home-outline,.mg-b-0,h4,.br-header{
                    display:none;
                }
                .thead{
                    background-color: red;
                }
                h1{
                    display: block;
                }
                .nav-link-profile img{
                    display:none;

                }
                
            }
        </style>
    @endsection
        
        