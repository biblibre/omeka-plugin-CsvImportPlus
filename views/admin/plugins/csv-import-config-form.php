<fieldset id="fieldset-csv-import-rights"><legend><?php echo __('Rights and Roles'); ?></legend>
    <div class="field">
        <div class="two columns alpha">
            <?php echo $this->formLabel('csv_import_allow_roles', __('Roles that can use Csv Import')); ?>
        </div>
        <div class="inputs five columns omega">
            <div class="input-block">
                <?php
                    $currentRoles = unserialize(get_option('csv_import_allow_roles')) ?: array();
                    $userRoles = get_user_roles();
                    echo '<ul>';
                    foreach ($userRoles as $role => $label) {
                        echo '<li>';
                        echo $this->formCheckbox('csv_import_allow_roles[]', $role,
                            array('checked' => in_array($role, $currentRoles) ? 'checked' : ''));
                        echo $label;
                        echo '</li>';
                    }
                    echo '</ul>';
                ?>
            </div>
        </div>
    </div>
    <div class="field">
        <div class="two columns alpha">
            <?php echo $this->formLabel('csv_import_slow_process', __('Slow the process')); ?>
        </div>
        <div class="inputs five columns omega">
            <?php echo $this->formText('csv_import_slow_process', get_option('csv_import_slow_process'), null); ?>
            <p class="explanation">
                <?php echo __('Some providers check if too many files are uploaded in one shot and prevent the import.'); ?>
                <?php echo __('This option sleeps the process during this number of seconds to avoid such a limit.'); ?>
            </p>
        </div>
    </div>
</fieldset>
