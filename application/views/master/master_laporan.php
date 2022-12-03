
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    
    <div class='row'>
    
        <div class='col-md-12'>
        
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='fas fa-print side-menu-icon fa-fw'></i> Data Valid</h3>
                    <?php if ($this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'HD') { ?>
                    <div class='box-tools pull-right'>
                        <a href="<?=site_url('export_pdf');?>">
                            <button class='btn btn-sm btn-flat btn-danger' ><i class='fas fa-file-pdf'></i> Export Pdf</button>
                        </a>
                        <a href="<?=site_url('export_excel');?>">
                            <button class='btn btn-sm btn-flat btn-success'><i class='fa fa-file-excel'></i> Export Excel</button>
                        </a>
                    </div>
                    <?php } ?>
                </div><!-- /.box-header -->
                <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                        <thead>
                            <tr>
                                <th width='5px'>#</th>
                                <th>Nama Siswa</th>
                                <th>Nisn</th>
                                <th>Atas Nama</th>
                                <th>No Rek</th>
                                <th>Nama Bank</th>
                                <th>Kabupaten</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->session->userdata('level') == 'Super') { ?>
                                <?php $no=1; foreach($siswa_super as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><a data-toggle="modal" href="#buku<?=$row['id_siswa'];?>" style="font-style:bold;"><?=$row['nm_siswa']?></a></td>
                                    <td><?=$row['nisn']?></td>
                                    <td><?=$row['atas_nama']?></td>
                                    <td><?=$row['no_rek']?></td>
                                    <td><?=$row['nm_bank']?></td>
                                    <td><?=$row['nama_kabupaten']?></td>
                                    <td>
                                    <span class="badge" style="background:green;"><?=$row['status']?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php } ?>

                            <?php if ($this->session->userdata('level') == 'Admin') { ?>
                                <?php $no=1; foreach($siswa_admin as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><a data-bs-toggle="modal" href="#buku<?=$row['id_siswa'];?>" style="font-style:bold;"><?=$row['nm_siswa']?></a></td>
                                    <td><?=$row['nisn']?></td>
                                    <td><?=$row['atas_nama']?></td>
                                    <td><?=$row['no_rek']?></td>
                                    <td><?=$row['nm_bank']?></td>
                                    <td><?=$row['nama_kabupaten']?></td>
                                    <td>
                                    <span class="badge" style="background:green;"><?=$row['status']?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

    </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
