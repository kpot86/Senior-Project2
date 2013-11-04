<?php $this->load->view("template_header"); ?>
<?php $this->load->helper("user_image"); ?>

<?php 
    if ($no_results) 
    {
?>
        <p>No data for the specified user</p>
<?php 
    } 
    else 
    {
?>

        <?php echo anchor('/user/linkedIn_sync', 'Sync with LinkedIn', array('class' => 'btn btn-primary btn-large pull-right'))  ?>

        <?php if(strcmp($userDetails->user->role ,"HEAD") == 0){ ?>
            <h2>Head Professor Profile</h2>
        <?php } else if(strcmp($userDetails->user->role ,"STUDENT") == 0){ ?>
            <h2>Student Profile</h2>
        <?php } else if (strcmp($userDetails->user->role ,"PROFESSOR") == 0){ ?>
            <h2>Professor Profile</h2>
        <?php } ?>

        <?php echo form_open('usercontroller/update', array(
            'id' => 'form-update-user'
        )); ?>

            <div>

                <div class="row-fluid">
                    <div class="span4 center-text">
                        <?php 
                            echo img(array(
                                'id' => 'img-user-profile',
                                'src' => getUserImage($this, $userDetails->user->picture),
                                'class' => 'user-img-large',
                                'alt' => $userDetails->getFullName()
                            ));

                            /* this field contains the image url that needs to be stored in the DB */
                            echo form_hidden(array('hidden-img-src' => $userDetails->user->picture));
                        ?>
                        <p id="link-change-image-container">
                            <a id="link-change-image" href="#">Click to change image</a>
                        </p>

                        <div id="text-img-url-container">
                            <p>
                                <?php 
                                    echo form_input(array(
                                        'id' => 'text-img-url',
                                        'name' => 'text-img-url',
                                        'type' => 'text',
                                        'class' => 'input-large',
                                        'placeholder' => 'http://example.com/img1.png',
                                        'value' => $userDetails->user->picture,
                                        'title' => 'Profile Image' /*,
                                        'required' => '' */
                                    ));
                                ?>
                            </p>

                            <p>
                                <a id="link-change-image-cancel" href="#">Cancel</a>
                                <a id="link-change-image-ok" href="#">OK</a>
                            </p>
                        </div>

                    </div>

                    <div class="span8">

                        <?php 
                            echo form_input(array(
                                'id' => 'text-first-name',
                                'name' => 'text-first-name',
                                'type' => 'text',
                                'class' => 'input-small',
                                'placeholder' => 'First Name...',
                                'value' => $userDetails->user->first_name,
                                'required' => '',
                                'title' => 'First Name'
                            ));
                        ?>

                        <?php 
                            echo form_input(array(
                                'id' => 'text-last-name',
                                'name' => 'text-last-name',
                                'type' => 'text',
                                'class' => 'input-large',
                                'placeholder' => 'Last Name...',
                                'value' => $userDetails->user->last_name,
                                'required' => '',
                                'title' => 'Last Name'
                            ));
                        ?>

                        <?php
                            if (isset($userDetails->user->email) && 
                                strlen($userDetails->user->email) > 0)
                            {
                        ?> 
                                <p>
                                    <?php echo mailto($userDetails->user->email, $userDetails->user->email) ?>
                                </p>
                        <?php
                            }
                        ?>

                        <?php if (isset($canChangePassword) && $canChangePassword) { ?>
                            <p>
                                <?php echo anchor('change-password', 'Click to change password') ?>
                            </p>
                        <?php } ?>


                        
                    </div>
                </div>


                <div class="spaced-top">
                    <?php if (isset($userDetails->lSkills) && count($userDetails->lSkills) > 0) { ?>
                        <h4>Skills</h4>
                        <?php $this->load->view('subviews/skills_list', array('lSkills' => $userDetails->lSkills) )?>
                    <?php }?>
                </div>

                <div class="spaced-top">
                    <?php if (isset($userDetails->lLanguages) && count($userDetails->lLanguages) > 0) { ?>
                        <h4>Languages</h4>
                        <?php $this->load->view('subviews/skills_list', array('lSkills' => $userDetails->lLanguages) )?>
                    <?php }?>
                </div>

                <div class="spaced-top">

                        <h4>Short Bio</h4>

                        <?php 
                            echo form_textarea(array(
                                'id' => 'text-description',
                                'name' => 'text-description',
                                //'class' => 'input-large',
                                'rows' => '12',
                                'placeholder' => 'Tell us a little bit about yourself...',
                                'value' => $userDetails->user->summary_spw,
                                'required' => '',
                                'Title' => 'Project Description'
                            ));
                        ?>

                </div>

                <?php 
                    echo form_submit(array(
                        'id' => 'btn-submit',
                        'name' => 'btn-submit',
                        'type' => 'Submit',
                        'class' => 'btn btn-large btn-primary pull-right',
                        'value' => 'Save Changes'
                    ));
                ?>

                <div class="spaced-top">
                    <?php if(isset($userDetails->user->summary_linkedIn) && strlen($userDetails->user->summary_linkedIn) > 0) {?>
                        <h4>Linked In Summary</h4>
                        <?php echo $userDetails->user->summary_linkedIn ?>
                    <?php }?>
                </div>

                <div class="spaced-top">
                    <?php $this->load->view('subviews/experience_list', array('lExperiences' => $userDetails->lExperiences)) ?>
                </div>

                <div class="clearfix"></div>

            </div>

        <?php echo form_close() ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#text-img-url-container').hide();

                $('#link-change-image').click(function(e){
                    e.preventDefault();
                    e.stopPropagation();

                    $('#link-change-image-container').hide();
                    $('#text-img-url-container').show();
                });

                $('#link-change-image-cancel').click(function(e){
                    e.preventDefault();
                    e.stopPropagation();

                    $('#text-img-url-container').hide();
                    $('#link-change-image-container').show();
                });

                $('#link-change-image-ok').click(function(e){
                    e.preventDefault();
                    e.stopPropagation();

                    var newImgSrc = $('#text-img-url').val();

                    //alert(newImgSrc);

                    $('#img-user-profile').attr('src', newImgSrc);
                    $('input[name=hidden-img-src]').val(newImgSrc);

                    $('#text-img-url-container').hide();
                    $('#link-change-image-container').show();
                });
            });
        </script>
<?php 
    }
?>

<?php $this->load->view("template_footer"); ?>