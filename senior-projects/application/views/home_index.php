<?php $this->load->view("template_header"); ?>

<?php if ($no_results) { ?>

    <p>There is no projects on database.</p>

<?php } else { ?>


    <?php if (isset($lSuggestedProjects) && count($lSuggestedProjects) > 0) { ?>
        <?php $this->load->view('subviews/project_summary_list', array(
            'lProjects' => $lSuggestedProjects, 
            'list_title' => 'Suggested Projects',
            'list_class' => 'suggested-projects'
        ) ) ?>
        <hr>
    <?php } ?>

    <?php if (isset($lRegularProjects) && count($lRegularProjects) > 0) { ?>
        <?php $this->load->view('subviews/project_summary_list', array(
            'lProjects' => $lRegularProjects, 
            'list_title' => '',
            'list_class' => ''
        ) )?>
    <?php } ?>

<?php }?>
    
<?php $this->load->view("template_footer"); ?>