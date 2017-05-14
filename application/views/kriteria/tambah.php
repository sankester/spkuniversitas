    <div class="page-header">
        <h1>Tambah Kriteria</h1>
    </div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="errors">
                <?php
                $errors = $this->session->flashdata('errors');
                if (isset($errors)) {
                    foreach ($errors as $error) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?php echo $error; ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php echo form_open('',array('class' => 'form-horizontal'))?>
                <div class="form-group">
                    <?php echo form_label('Kriteria :', '',array('for' => 'inputKriteria', 'class' => 'col-sm-2 control-label')) ?>
                    <div class="col-sm-10">
                        <?php echo form_input('kriteria', set_value('kriteria'), array('id' => 'inputKriteria', 'class' =>'form-control' )) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Sifat :', '',array('for' => 'inputSifat', 'class' => 'col-sm-2 control-label')) ?>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <?php echo form_radio('sifat','B', true )?> Benefit
                        </label>
                        <label class="radio-inline">
                            <?php echo form_radio('sifat','C' )?> Cost
                        </label>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Bobot :', '',array('for' => 'inputBobot', 'class' => 'col-sm-2 control-label')) ?>
                    <div class="col-sm-10">
                        <?php echo form_input('bobot', set_value('bobot'), array('id' => 'inputBobot', 'class' =>'form-control' )) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Item Criteria :', '',array('class' => 'col-sm-2 control-label')) ?>
                    <div class="col-sm-9">
                        <?php echo form_input('itemKriteria1', set_value('itemKriteria1'), array('id' => 'itemKriteria1', 'class' =>'form-control' )) ?>
                    </div>
                    <div class="col-sm-1">
                        <p class="text-center">Value : 1</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-offset-2 col-sm-9">
                        <?php echo form_input('itemKriteria2', set_value('itemKriteria2'), array('id' => 'itemKriteria2', 'class' =>'form-control' )) ?>
                    </div>
                    <div class="col-sm-1">
                        <p class="text-center">Value : 2</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-offset-2 col-sm-9">
                        <?php echo form_input('itemKriteria3', set_value('itemKriteria3'), array('id' => 'itemKriteria3', 'class' =>'form-control' )) ?>
                    </div>
                    <div class="col-sm-1">
                        <p class="text-center">Value : 3</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-offset-2 col-sm-9">
                        <?php echo form_input('itemKriteria4', set_value('itemKriteria4'), array('id' => 'itemKriteria4', 'class' =>'form-control' )) ?>
                    </div>
                    <div class="col-sm-1">
                        <p class="text-center">Value : 4</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-offset-2 col-sm-9">
                        <?php echo form_input('itemKriteria5', set_value('itemKriteria5'), array('id' => 'itemKriteria5', 'class' =>'form-control' )) ?>
                    </div>
                    <div class="col-sm-1">
                        <p class="text-center">Value : 5</p>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php echo form_submit('simpan', 'Simpan', array('class' => 'btn btn-success')) ?>
                    </div>
                </div>
            <?php echo form_close()?>
        </div>
    </div>

</div>
