@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
    <h1>
        Invoice
        <small>{{{ $commande->code }}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>

<div class="pad margin no-print">
    <div class="alert alert-info" style="margin-bottom: 0!important;">
        <i class="fa fa-info"></i>
        <b>Note:</b> This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
    </div>
</div>

<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Steria
                <small class="pull-right"><?php echo date('d F Y');?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Steria</strong><br>
                Bât EOLIS 2<br>
                8, avenue Yves Brunaud<br>
                BP 90133<br>
                31772 COLOMIERS CEDEX<br>
                Phone: 33 5 34 35 90 00 <br/>
                http://www.steria.com/fr/
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>{{{ $commande->contrat->contact->nom }}}</strong><br>
                <strong>{{{ $commande->contrat->contact->nom }}}</strong><br>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice {{{ $commande->code }}}</b><br/>
            <br/>
            <b>Order ID:</b> 4F3S8J<br/>
            <b>Payment Due:</b> 2/22/2014<br/>
            <b>Account:</b> 968-34567
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cpt =0; ?>
                    @foreach($commande->items as $item)
                    <tr>
                        <td>1</td>
                        <td>{{{ $item->code }}}</td>
                        <td>{{{ $item->description }}}</td>
                        <td>{{{ $item->montant }}}</td>
                        <?php $cpt = $cpt + $item->montant ; ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">

        </div><!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Amount Due 2/22/2014</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php print_r($cpt) ?></td>
                    </tr>
                    <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                    </tr>
                    <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                    </tr>
                </table>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</section><!-- /.content -->


{{ Form::close() }}

@stop