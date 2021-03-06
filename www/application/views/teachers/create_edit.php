<div id="tab-3">
    <div class="sepH_c">
        <div id="user-block">
            <?php if(!empty($success)): ?>
                <div class="success">
                    <p><?php echo $success ?></p>
                </div>
            <?php endif; ?>
            <? if(isset($edit)):?>
                <h1 class="sepH_c">Edit Teacher Profile</h1>
            <? else:?>
                <h1 class="sepH_c">Create Teacher Profile</h1>
            <? endif?>
            <div class="cf formEl sepH_b">
                <form id="imageform" method="post" enctype="multipart/form-data" action='<?=URL::base()?>ajax/ajaximage'>
                    <div class="dp33 tac">
                        <img id="img-polaroid" alt="" src="<?=(isset($user_data) AND Valid::not_empty($user_data['image']))?
                            URL::base().'files/users/'.$user_data['teacher_id'].'/110x110/'.$user_data['image']: 
                            '/laguadmin/images/user_noPhoto100.gif'?>" />
                        <div id="block-loader">
                        </div>
                        <input type="file" name="photoimg" id="photoimg" />
                    </div>
                </form>
                
                <? if(isset($register)):?>
                <form class="formEl_a form teacher-form" name="register_teacher" 
                      action="<?php echo URL::base() ?>session/registerteacher" method="POST" >
                <? elseif(isset($edit)):?>
                <form class="formEl_a form teacher-form" name="edit_teacher" 
                      action="<?php echo URL::base() ?><?=$role?>/teachers/edit/<?php echo $user->id ?>" method="POST" >
                <? else:?>
                <form class="formEl_a form teacher-form" name="create_teacher" 
                      action="<?php echo URL::base() ?><?=$role?>/teachers/create" method="POST" >
                <? endif;?>
                    <div class="dp60">
                        <input type="hidden" id="image_path" name="image_path" value=""/>

                        <? if(isset($user_data)):?>
                            <input type="hidden" name="teacher_id" value="<?=$user_data['teacher_id']?>">
                        <? endif;?>
                            
                        <? if(isset($user_data)):?>    
                        <fieldset id="main-info">
                            <legend>Main info</legend>
                            <? if(isset($edit)):?>
                            <div class="sepH_b">
                                <label class="lbl_b">Teacher ID (Login) - <?=$user->username?></label>
                            </div>
                            <? endif;?>
                        </fieldset>
                        <? endif;?>

                        <fieldset>
                            <legend>First Name/Father's Name/Grandfather's Name</legend>
                            <div class="sepH_b">
                                <label for="name" class="lbl_a">First Name:</label>
                                <input type="text" name="name" id="name" class="inpt_a
                                    <?=(! isset($user_data))? 'required': ''?>" value="<?=(isset($user_data))? $user_data['name']: ''?>">
                            </div>
                            <div class="sepH_b">
                                <label for="fathername" class="lbl_a">Father's Name:</label>
                                <input type="text" name="fathername" id="fathername" class="inpt_a
                                    <?=(! isset($user_data))? 'required': ''?>" value="<?=(isset($user_data))? $user_data['fathername']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="grfathername" class="lbl_a">Grandfather's Name:</label>
                                <input type="text" name="grfathername" id="grfathername" class="inpt_a
                                    <?=(! isset($user_data))? 'required': ''?>" value="<?=(isset($user_data))? $user_data['grfathername']: ''?>" />
                            </div>
                        </fieldset>
                            
                        <fieldset>
                            <? if(isset($errors))
                                $email_error = key_exists('email', $errors);
                            ?>
                            <legend>Email</legend>
                            <div class="sepH_b <?=($email_error)? 'error': ''?>">
                                <label for="name" class="lbl_a">Email<?(isset($edit))? '<b class="req"> *</b>': ''?>:</label>
                                <input type="text" name="email" id="email" class="inpt_a 
                                    <?=(! isset($user_data))? 'required': ''?>" value="<?=(isset($user_data))? $user_data['email']: ''?>">
                            </div>
                        </fieldset>
                            
                        <fieldset>
                            <legend>Password</legend>
                            <? if(isset($errors))
                                $password_error = key_exists('password', $errors);
                            ?>
                            <div class="sepH_b <?=($password_error)? 'error': ''?>">
                                <label for="password" class="lbl_a">Password:</label>
                                <input type="password" name="password" id="name" class="inpt_a
                                    <?=(! isset($user_data))? 'required': ''?>" value="">                                    
                            </div>
                            <? if(isset($errors))
                                $confirm_password_error = key_exists('password_confirm', $errors);
                            ?>
                            <div class="sepH_b <?=($confirm_password_error)? 'error': ''?>">
                                <label for="password_confirm" class="lbl_a">Confirm Password:</label>
                                <input type="password" name="password_confirm" id="name" class="inpt_a
                                    <?=(! isset($user_data))? 'required': ''?>" value="">
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Birthday/Sex</legend>
                            <div class="sepH_c cf">
                                <label for="datepick-1" class="lbl_a">Date of birth (E.C):</label>
                                <input type="text" name="dob" id="datepick-1" class="inpt_b datepicker" value="<?=(isset($user_data))? $user_data['dob']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="sex" class="lbl_a">Sex:</label>
                                <select name="sex" id="a_select">
                                    <option value="0" <?=(isset($user_data) AND $user_data['sex'] == '0')? 'selected': ''?>>Male</option>
                                    <option value="1" <?=(isset($user_data) AND $user_data['sex'] == '1')? 'selected': ''?>>Female</option>
                                </select>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Home Address</legend>
                            <div class="sepH_b">
                                <label for="home_address_kk" class="lbl_a">Kifle Ketema:</label>
                                <input type="text" name="home_address[kk]" id="home_address_kk" class="inpt_a" value="<?=(isset($user_data))? $user_data['home_address']['kk']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="home_address_k" class="lbl_a">Kebele:</label>
                                <input type="text" name="home_address[k]" id="home_address_k" class="inpt_a" value="<?=(isset($user_data))? $user_data['home_address']['k']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="home_address_h" class="lbl_a">House No.:</label>
                                <input type="text" name="home_address[h]" id="home_address_h" class="inpt_a" value="<?=(isset($user_data))? $user_data['home_address']['h']: ''?>"/>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Information about last job</legend>
                            <div class="sepH_b">
                                <label for="lpw" class="lbl_a">Last Place of work:</label>
                                <input type="text" name="lpw" id="lpw" class="inpt_a" value="<?=(isset($user_data))? $user_data['lpw']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="job" class="lbl_a">Job Title:</label>
                                <input type="text" name="job" id="job" class="inpt_a" value="<?=(isset($user_data))? $user_data['job']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="contact_name" class="lbl_a">Contact Name (Reference):</label>
                                <input type="text" name="contact_name" id="contact_name" class="inpt_a" value="<?=(isset($user_data))? $user_data['contact_name']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="address" class="lbl_a">Address:</label>
                                <input type="text" name="address" id="address" class="inpt_a" value="<?=(isset($user_data))? $user_data['address']: ''?>"/>
                            </div>
                            <fieldset>
                                <legend>Telephone</legend>
                                <div class="sepH_b">
                                    <label for="telephone_of" class="lbl_a">Office:</label>
                                    <input type="text" name="telephone[of]" id="telephone_of" class="inpt_a" value="<?=(isset($user_data))? $user_data['telephone']['of']: ''?>"/>
                                </div>
                                <div class="sepH_b">
                                    <label for="telephone_m" class="lbl_a">Mobile:</label>
                                    <input type="text" name="telephone[m]" id="telephone_m" class="inpt_a" value="<?=(isset($user_data))? $user_data['telephone']['m']: ''?>"/>
                                </div>
                            </fieldset>
                        </fieldset>
                            
                        <fieldset>
                            <legend>Emergency information</legend>
                            <div class="sepH_b">
                                <label for="emergency_contact" class="lbl_a">Emergency Contact:</label>
                                <input type="text" name="emergency[contact]" id="emergency_contact" class="inpt_a" value="<?=(isset($user_data))? $user_data['emergency']['contact']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="emergency_relation" class="lbl_a">Relation to you:</label>
                                <input type="text" name="emergency[relation]" id="emergency_relation" class="inpt_a" value="<?=(isset($user_data))? $user_data['emergency']['relation']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="emergency_pw" class="lbl_a">Place of work:</label>
                                <input type="text" name="emergency[pw]" id="emergency_pw" class="inpt_a" value="<?=(isset($user_data))? $user_data['emergency']['pw']: ''?>"/>
                            </div>
                            <div class="sepH_b">
                                <label for="emergency_tm" class="lbl_a">Mobile:</label>
                                <input type="text" name="emergency[tm]" id="emergency_tm" class="inpt_a" value="<?=(isset($user_data))? $user_data['emergency']['tm']: ''?>"/>
                                <div id="emerg-desc">Contacts telephones in case of emergency (give detailed information)</div id="emerg-desc">
                            </div>
                            <fieldset id="languages">
                                <legend>Languages spoken:</legend>
                                <div class="sepH_b">
                                    <label for="languages_0" class="lbl_a">1:</label>
                                    <input type="text" name="languages[0]" id="languages_0" class="inpt_a" value="<?=(isset($user_data))? $user_data['languages']['0']: ''?>"/>
                                </div>
                                <div class="sepH_b">
                                    <label for="languages_1" class="lbl_a">2:</label>
                                    <input type="text" name="languages[1]" id="languages_1" class="inpt_a" value="<?=(isset($user_data))? $user_data['languages']['1']: ''?>"/>
                                </div>
                                <div class="sepH_b">
                                    <label for="languages_2" class="lbl_a">3:</label>
                                    <input type="text" name="languages[2]" id="languages_2" class="inpt_a" value="<?=(isset($user_data))? $user_data['languages']['2']: ''?>"/>
                                </div>
                            </fieldset>
                        </fieldset>
                            
                        <fieldset>
                            <legend>Any health conditions that the school should know about:</legend>
                            <div class="sepH_b">
                                <label for="health" class="lbl_a">Please specify:</label>
                                <div id="health_conditions">
                                    <?if(isset($user_data)):?>
                                    <?php foreach ($user_data['health'] as $key => $value): ?>
                                    <div class="condition">
                                        <input type="text" id="health-<?=$key?>" name="health[]" id="health" class="inpt_a input_cond" value="<?=$value?>"/>
                                        <a href="#" class="remove-condition" id="<?=$key?>">
                                            <img class="delete-button" src="http://dandiigo.loc/laguadmin/images/icons/trashcan_gray.png">
                                        </a>
                                    </div>
                                    <? endforeach;?>
                                    <? else:?>
                                        <div class="condition">
                                            <input type="text" id="health[0]" name="health[]" id="health" class="inpt_a input_cond" value=""/>
                                            <a href="#" class="remove-condition" id="0">
                                                <img class="delete-button" src="http://dandiigo.loc/laguadmin/images/icons/trashcan_gray.png">
                                            </a>
                                        </div>
                                    <? endif?>
                                </div>
                            </div>
                            <div>
                                <img id="more-conditions" src="<?=URL::base()?>/laguadmin/images/icons/add.png" alt="">
                            </div>
                        </fieldset>
                            
                        <fieldset>
                            <legend>Qualification:</legend>
                            <div class="qualifications">
                            <? if(isset($user_data)):?>
                            <?php foreach($user_data['qualification'] as $key => $qualification): ?>
                                <div class="qualification">
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="qualification_<?php echo $key ?>_name">Name of Qualification:</label>
                                        <input type="text" name="qualification[<?php echo $key ?>][name]" 
                                               id="qualification_<?php echo $key ?>_name" class="inpt_a" value="<?=$qualification['name']?>"/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="qualification_<?php echo $key ?>_level">Level (PHD, Masters...):</label>
                                        <input type="text" name="qualification[<?php echo $key ?>][level]" 
                                               id="qualification_<?php echo $key ?>_level" class="inpt_a" value="<?=$qualification['level']?>"/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="qualification_<?php echo $key ?>_year">Year of Completion:</label>
                                        <input type="text" name="qualification[<?php echo $key ?>][year]" 
                                               id="qualification_<?php echo $key ?>_level" class="inpt_a" value="<?=$qualification['level']?>"/>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <? else:?>
                                <div class="qualification">
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="qualification_0_name">Name of Qualification:</label>
                                        <input type="text" name="qualification[0][name]" 
                                               id="qualification_0_name" class="inpt_a" value=""/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="qualification_0_level">Level (PHD, Masters...):</label>
                                        <input type="text" name="qualification[0][level]" 
                                               id="qualification_0_level" class="inpt_a" value=""/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="qualification_0_year">Year of Completion:</label>
                                        <input type="text" name="qualification[0][year]" 
                                               id="qualification_0_level" class="inpt_a" value=""/>
                                    </div>
                                </div>
                            <? endif?>
                            </div>
                            <a href="#" id="more-qualification"><img src="<?php echo URL::base() ?>/laguadmin/images/icons/add.png"></a>
                        </fieldset>
                            
                        <fieldset>
                            <legend>Experience:</legend>
                            <div class="experiences">
                            <? if(isset($user_data)):?>    
                            <?php foreach($user_data['experience'] as $key => $experience): ?>
                                <div class="experience">
                                    <fieldset class="experience-year">
                                        <legend>Year:</legend>
                                        <div class="sepH_b">
                                            <label for="experience_<?php echo $key ?>_yfr" class="lbl_a">From:</label>
                                            <input type="text" name="experience[<?php echo $key ?>][yfr]"
                                                id="experience_<?php echo $key ?>_yfr" class="inpt_b" value="<?=$experience['yfr']?>"/>
                                        </div>
                                        <div class="sepH_b">
                                            <label for="experience_<?php echo $key ?>_yto" class="lbl_a">To:</label>
                                            <input type="text" name="experience[<?php echo $key ?>][yto]"
                                                id="experience_<?php echo $key ?>_yto" class="inpt_b" value="<?=$experience['yto']?>"/>
                                        </div>
                                    </fieldset>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_<?php echo $key ?>_pw">Place of work:</label>
                                        <input type="text" name="experience[<?php echo $key ?>][pw]"
                                            id="experience_<?php echo $key ?>_pw" class="inpt_a" value="<?=$experience['pw']?>"/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_<?php echo $key ?>_job">Job Title:</label>
                                        <input type="text" name="experience[<?php echo $key ?>][job]"
                                            id="experience_<?php echo $key ?>_job" class="inpt_a" value="<?=$experience['job']?>"/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_<?php echo $key ?>_contact">Contact Name (Reference):</label>
                                        <input type="text" name="experience[<?php echo $key ?>][contact]"
                                            id="experience_<?php echo $key ?>_contact" class="inpt_a" value="<?=$experience['contact']?>"/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_<?php echo $key ?>_address">Address:</label>
                                        <input type="text" name="experience[<?php echo $key ?>][address]"
                                            id="experience_<?php echo $key ?>_address" class="inpt_a" value="<?=$experience['address']?>"/>
                                    </div>
                                    <fieldset>
                                        <legend>Telephone</legend>
                                        <div class="sepH_b">
                                            <label for="experience_<?php echo $key ?>_to">Office:</label>
                                            <input type="text" name="experience[<?php echo $key ?>][to]" 
                                                   id="experience_<?php echo $key ?>_to" class="inpt_a" value="<?=$experience['to']?>"/>
                                        </div>
                                        <div class="sepH_b">
                                            <label for="experience_<?php echo $key ?>_tm">Mobile:</label>
                                            <input type="text" name="experience[<?php echo $key ?>][tm]" 
                                                   id="experience_<?php echo $key ?>_tm" class="inpt_a" value="<?=$experience['tm']?>"/>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php endforeach; ?>
                            <? else:?>
                                <div class="experience">
                                    <fieldset class="experience-year">
                                        <legend>Year:</legend>
                                        <div class="sepH_b">
                                            <label for="experience_0_yfr" class="lbl_a">From:</label>
                                            <input type="text" name="experience[0][yfr]"
                                                id="experience_0_yfr" class="inpt_b" value=""/>
                                        </div>
                                        <div class="sepH_b">
                                            <label for="experience_0_yto" class="lbl_a">To:</label>
                                            <input type="text" name="experience[0][yto]"
                                                id="experience_0_yto" class="inpt_b" value=""/>
                                        </div>
                                    </fieldset>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_0_pw">Place of work:</label>
                                        <input type="text" name="experience[0][pw]"
                                            id="experience_0_pw" class="inpt_a" value=""/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_0_job">Job Title:</label>
                                        <input type="text" name="experience[0][job]"
                                            id="experience_0_job" class="inpt_a" value=""/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_0_contact">Contact Name (Reference):</label>
                                        <input type="text" name="experience[0][contact]"
                                            id="experience_0_contact" class="inpt_a" value=""/>
                                    </div>
                                    <div class="sepH_b">
                                        <label class="lbl_a" for="experience_0_address">Address:</label>
                                        <input type="text" name="experience[0][address]"
                                            id="experience_0_address" class="inpt_a" value=""/>
                                    </div>
                                    <fieldset>
                                        <legend>Telephone</legend>
                                        <div class="sepH_b">
                                            <label class="lbl_a" for="experience_0_to">Office:</label>
                                            <input type="text" name="experience[0][to]" 
                                                   id="experience_0_to" class="inpt_a" value=""/>
                                        </div>
                                        <div class="sepH_b">
                                            <label class="lbl_a" for="experience_0_tm">Mobile:</label>
                                            <input type="text" name="experience[0][tm]" 
                                                   id="experience_0_tm" class="inpt_a" value=""/>
                                        </div>
                                    </fieldset>
                                </div>
                            <? endif;?>
                            </div>
                            <a href="#" id="more-experience"><img src="<?php echo URL::base() ?>/laguadmin/images/icons/add.png"></a>
                        </fieldset>
                            
                        <? if(isset($edit)):?>
                        <button type="submit" class="btn btn_dL sepH_b">Update Teacher</button>
                        <? else:?>
                        <button type="submit" class="btn btn_dL sepH_b">Create Teacher</button>
                        <? endif;?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>