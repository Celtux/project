<div class="form-section__data">
    <?php if (!empty($form_title)): ?>
        <h2><?php echo $form_title; ?></h2>
    <?php endif; ?>

    <div class="form-section__data_points">
        <?php if (!empty($form_sub_title)): ?>
            <span><?php echo $form_sub_title; ?></span>
        <?php endif; ?>

        <?php if (!empty($form_steps)): ?>
            <div class="form-section__data_points_list">
                <?php foreach ($form_steps as $step):
                    $point = $step['step'];
                    if (!empty($point)):?>
                        <div class="form-section__data_points_list_point">
                            <span><?php echo $point; ?></span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($form_description)): ?>
        <?php echo $form_description; ?>
    <?php endif; ?>
</div>