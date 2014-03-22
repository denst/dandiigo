<div id="level-sidebar">
    <div class="micro">
        <a href="<?=URL::base()?>sadmin/students/slider">
            <h4 <?=(isset($sidebar_index) AND $sidebar_index == 'slider')? 'class="micro-active"': ''?>>
                <span>Slider students</span>
            </h4>
        </a>
    </div>
    <div class="micro">
        <a href="<?=URL::base()?>sadmin/students/tab">
            <h4 <?=(isset($sidebar_index) AND $sidebar_index == 'tab')? 'class="micro-active"': ''?>>
                <span>Tab students</span>
            </h4>
        </a>
    </div>
    <div class="micro">
        <a href="<?=URL::base()?>sadmin/students/dropout">
            <h4 <?=(isset($sidebar_index) AND $sidebar_index == 'dropout')? 'class="micro-active"': ''?>>
                <span>Dropout students</span>
            </h4>
        </a>
    </div>
    <div class="micro">
        <a href="<?=URL::base()?>sadmin/students/create">
            <h4 <?=(isset($sidebar_index) AND $sidebar_index == 'create')? 'class="micro-active"': ''?>>
                <span>Create Student</span>
            </h4>
        </a>
    </div>
</div>