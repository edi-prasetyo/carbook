<div class="card">
    <div class="card-body">
                     
                        <!-- info row -->
                        <div class="row invoice-info">
                            
                            <div class="col-sm-6 invoice-col">
                                Customer
                                <address>
                                    <strong><?php echo $transaksi->user_name;?></strong>
                                    <br>
                                    Address:
                                    <?php echo $transaksi->user_address;?>                                    <br>
                                    Phone:
                                    <?php echo $transaksi->user_phone;?>                                   <br>
                                    Email: <?php echo $transaksi->user_email;?>                               </address>
                            </div><!-- /.col -->
                            <div class="col-sm-6 invoice-col">
                                <b>Invoice <?php echo $transaksi->kode_transaksi;?></b><br>
                                <br>
                                <b>Nama Produk :</b> <?php echo $transaksi->product_name;?><br>
                                <b>Tanggal Order:</b> <?php echo date('d F Y', $transaksi->date_created); ?><br>
                                <b>Status :</b> <?php echo $transaksi->status_order;?>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
  
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                                                                <tr>
                                            <td><?php echo $transaksi->product_name;?></td>
                                            <td><?php echo $transaksi->product_qty;?></td>
                                            <td>Rp. <?php echo number_format($transaksi->product_price,'0',',','.'); ?></td>
                                            <td>Rp. <?php $total = $transaksi->product_price*$transaksi->product_qty; echo number_format($total,'0',',','.'); ?></td>
                                        </tr>
                                                                            </tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

          

                        <!-- this row will not appear when printing -->
                        <!-- <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                            </div>
                        </div> -->
                    </div>
                    </div>