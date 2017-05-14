<div class="page-header">
    <h1>Halaman Olah Universitas</h1>
</div>
<div class="col-lg-12">
    <?php
    $msg = $this->session->flashdata('message');
    if (isset($msg)) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $msg; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="panel panel-primary">

            <div class="panel-heading">List Universitas</div>
            <div class="panel-content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-6">Universitas</th>
                            <th class="col-md-5 ">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($universitas as $item) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $item->universitas ?></td>
                                <td>

                                    <!-- Contextual button for informational alert messages -->
<!--                                    <button type="button" class="btn btn-info btn-xs"-->
<!--                                            onclick="lihat_kriteria(--><?php //echo $item->kdUniversitas; ?><!--)">-->
<!--//                                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Lihat-->
<!--//                                    </button>-->
                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('universitas/tambah/'.$item->kdUniversitas)?>" role="button">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah
                                    </a>

                                    <!-- Indicates a dangerous or potentially negative action -->
                                    <button type="button" data-toggle="modal" class="btn btn-danger btn-xs"
                                            data-target="#modalDelete">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus
                                    </button>

                                </td>
                            </tr>
                            <?php
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <a href="<?php echo site_url('universitas/tambah') ?>" type="button" class="btn btn-primary">Tambah
                Universitas</a>
        </div>

    </div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi hapus data</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin menghapus data ini ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="hapus_universitas(<?php echo $item->kdUniversitas; ?>)">
                    Hapus
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
