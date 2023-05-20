<style>
    .divTable{
        display: table;
        width:600px;
        margin: 0 auto;"
    }
    .divTableRow {
        display: table-row;
    }
    .divTableCell, .divTableHead {
        display: table-cell;
        padding: 3px 10px;
    }

    .divTableBody {
        display: table-row-group;
    }

    .gap {
        margin-top: 20px
    }

    button.btn-extra,
    a.button.btn-extra,
    input[type="button"].button.btn-extra {
        font-size: 1em;
        height: 70px;
        padding: 0;
        text-transform: uppercase;
        background: transparent;
        color: #fff;
        line-height: 1.5em;
        border: 1px solid #01b7f2;
        border-left: none;
        position: relative;
        overflow: hidden;
        letter-spacing: 0;
        display: inline-table;
        table-layout: fixed;
        margin-right: 10px;
        margin-bottom: 10px
    }

    button.btn-extra>i,
    a.button.btn-extra>i,
    input[type="button"].button.btn-extra>i {
        width: 55px;
        vertical-align: middle;
        background: #01b7f2;
        color: #2d3e52;
        font-size: 36px;
        display: table-cell;
        height: 70px;
        text-align: right;
        padding-right: 8px
    }

    button.btn-extra>i:after,
    a.button.btn-extra>i:after,
    input[type="button"].button.btn-extra>i:after {
        display: block;
        content: "";
        position: absolute;
        left: 55px;
        border-bottom: 70px solid #01b7f2;
        border-right: 16px solid transparent;
        top: 0;
        bottom: 0
    }

    button.btn-extra>span,
    a.button.btn-extra>span,
    input[type="button"].button.btn-extra>span {
        display: table-cell;
        vertical-align: middle;
        padding: 0 20px 0 35px;
        text-align: left
    }

    button.btn-extra>span em,
    a.button.btn-extra>span em,
    input[type="button"].button.btn-extra>span em {
        color: #01b7f2;
        font-size: 1.6667em;
        font-weight: bold;
        font-style: normal

    }

    button.btn-extra:hover,
    a.button.btn-extra:hover,
    input[type="button"].button.btn-extra:hover {
        color: inherit;
        background: #fff;
        text-decoration: unset;
        cursor: pointer;
    }

    button.btn-extra:hover>i,
    a.button.btn-extra:hover>i,
    input[type="button"].button.btn-extra:hover>i {
        color: #fff
    }

    button.btn-extra.blue,
    a.button.btn-extra.blue,
    input[type="button"].button.btn-extra.blue {
        border-color: #01b7f2
    }

    button.btn-extra.blue>i,
    a.button.btn-extra.blue>i,
    input[type="button"].button.btn-extra.blue>i {
        background: #01b7f2
    }

    button.btn-extra.blue>i:after,
    a.button.btn-extra.blue>i:after,
    input[type="button"].button.btn-extra.blue>i:after {
        border-bottom-color: #01b7f2
    }

    button.btn-extra.blue>span em,
    a.button.btn-extra.blue>span em,
    input[type="button"].button.btn-extra.blue>span em {
        color: #01b7f2
    }

    button.btn-extra.yellow,
    a.button.btn-extra.yellow,
    input[type="button"].button.btn-extra.yellow {
        border-color: #fdb714
    }

    button.btn-extra.yellow>i,
    a.button.btn-extra.yellow>i,
    input[type="button"].button.btn-extra.yellow>i {
        background: #fdb714
    }

    button.btn-extra.yellow>i:after,
    a.button.btn-extra.yellow>i:after,
    input[type="button"].button.btn-extra.yellow>i:after {
        border-bottom-color: #fdb714
    }

    button.btn-extra.yellow>span em,
    a.button.btn-extra.yellow>span em,
    input[type="button"].button.btn-extra.yellow>span em {
        color: #fdb714
    }

   .button .btn-extra:hover {
        text-decoration: unset;
        cursor: pointer;
    }
</style>

<div class="col-sm-12 col-md-12 nopadding">
        <div class="col-sm-2 col-md-2 paddingone"></div>
        <div class="col-sm-8 col-md-8 paddingone">

            <h2 class="text-center"><?php echo __('Two-factor authentication'); ?></h2>

            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">

                        <div class="divTableCell">

                                    <img src="/img/2fa-google.png" style="margin-top: 20px" />
                            <?php if (!$has_2fa) { ?>
                                    <div class="d-flex justify-content-center h-100 gap">
                                        <a style="text-decoration: none" target="_blank" href="https://apps.apple.com/us/app/google-authenticator/id388497605" class="button btn-extra" data-abc="true">
                                            <i class="fa fa-apple" style="font-size:48px;"></i>
                                            <span>Download from<br><em>apple store</em></span>
                                        </a>
                                        <a style="text-decoration: none" target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" class="button btn-extra yellow" data-abc="true">
                                            <i class="fa fa-play"></i>
                                            <span>Download from<br><em>google play</em></span>
                                        </a>
                                    </div>
                            <?php } ?>
                        </div>

                        <div class="divTableCell">
                            <?= $this->Form->create() ?>
                            <div class="col-md-12 minheight nopadding">
                                <div class="content-wrap ">
                                    <div class="content-box-large">
                                        <div class="col-md-12">
                                            <?= $this->Flash->render('auth') ?>
                                            <?= $this->Flash->render() ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-sm-6">

                                                <?php if (!$has_2fa) { ?>

                                                    <div class="col-sm-5">
                                                        <div class="col-sm-12">
                                                            <img src="data:image/png;base64, <?php  echo $qr_content; ?>" alt="qc-code"/>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label><?php echo __('The secret key').": <b>" . $secret . "</b>\n\n"; ?></label>
                                                        </div>

                                                    </div>
                                                    <div style="" class="form-group">
                                                        <?= $this->Form->input('code', array('type' => 'text','class' => 'form-control','style'=>'float:none;','label' => __('Enter the 6 digit code'),'required'=>true)); ?>
                                                        <?= $this->Form->input('secret', array('type' => 'hidden','class' => 'form-control','value' => $secret)); ?>
                                                        <?= $this->Form->input('email', array('type' => 'hidden','class' => 'form-control','value' => $user_email)); ?>
                                                        <?= $this->Form->input('password', array('type' => 'hidden','class' => 'form-control','value' => $user_pass)); ?>
                                                    </div>
                                                    <div style="width: 230px;" class="col-sm-12 paddingleftnone">
                                                        <div class="col-sm-1 paddingleftnone paddingrightnone">
                                                            <?= $this->Form->input('confirmed_backup', ['type' => 'checkbox','class' => 'form-control','value'=>'1','style'=>'','required'=>true,'label'=>__('I made a backup of my 16-digit key.')]); ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearboth"></div>
                                                    <?php
                                                    echo $this->Form->button(__('Enable 2FA'), array('div' => false,'class' => 'btn btn-primary signup', 'title' => __('Enable 2FA')));

                                                } else {

                                                    ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('code', array('type' => 'text','class' => 'form-control','label' => __('Enter the 6 digit code'),'required'=>true, 'autofocus'=>'autofocus')); ?>
                                                        <?= $this->Form->input('email', array('type' => 'hidden','class' => 'form-control','value' => $user_email)); ?>
                                                        <?= $this->Form->input('password', array('type' => 'hidden','class' => 'form-control','value' => $user_pass)); ?>
                                                    </div>
                                                    <?php
                                                    echo  '<br>';
                                                    echo $this->Form->button(__('Verify'), array('div' => false,'class' => 'btn btn-primary signup','style' => 'padding:10px 12px;', 'title' => __('Verify')));
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="clearboth"></div>
                                    </div>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>

                    </div>
                </div>
            </div>

    </div>
</div>
