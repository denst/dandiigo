<div id="tab-2">
    <div id="user-block">
        <?php if(!empty($errors)): ?>
            <div class="error">
                <?php foreach($errors as $error): ?>
                    <p><?php echo $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <? if(isset($edit)):?> 
            <form class="formEl_a" action="<?php echo URL::base() ?><?=$role?>/achievementstudents/edit" method="POST">
        <? else:?>
            <form class="formEl_a" action="<?php echo URL::base() ?><?=$role?>/achievementstudents/create" method="POST">
        <? endif;?>
            <fieldset>
                <? if(isset($edit)):?>
                <input type="hidden" name="record_id" value="<?=$record->id?>" />
                <input type="hidden" name="student_id" value="<?=$student->student_id?>" />
                <input type="hidden" name="year_id" value="<?=$year?>" />
                <? else:?>
                    <input type="hidden" name="student_id" value="<?=$student->student_id?>" />
                <? endif?>
                <div class="sepH_b">
                    <label for="name" class="lbl_a">Student:</label>
                    <div class="records content"><?php echo $student->name ?> <?php echo $student->fathername ?> <?php echo $student->grfathername ?></div>
                </div>

                <div class="sepH_b">
                    <label for="date" class="lbl_a">Date:</label>
                    <input type="text" name="date" id="datepick-1" class="inpt_b datepicker" 
                        value="<?=(isset($record))? date('m/d/Y', $record->date): date('m/d/Y')?>">
                </div>

                <div class="sepH_b">
                    <label for="achievement" class="lbl_b">Achievement:</label>
                    <textarea id="a_textarea" name="achievement">
                        <?=(isset($record))? $record->achievement: ''?>
                    </textarea>
                </div>
                <div class="sepH_b">
                    <label for="notes" class="lbl_b">Notes:</label>
                    <textarea id="a_textarea" name="notes" cols="30" rows="10">
                        <?=(isset($record))? $record->notes: ''?>
                    </textarea>
                </div>
            </fieldset>
            <? if(isset($edit)):?>
                <button type="submit" class="btn btn_dL sepH_b">Edit record</button>
            <? else:?>
                <button type="submit" class="btn btn_dL sepH_b">Create record</button>
            <? endif;?>
        </form>
    </div>
</div>