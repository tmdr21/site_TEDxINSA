<?php

print_r('
<div class="form-group">
	<p class="form-label">'.team_modal_whichTeam.'</p>
	<div class="form-check"><input type="checkbox" name="teamChoice[]" class="form-check-input"  value="Speaker"><label class="form-check-label">'.team_modal_teamSpeaker.'</label></div>
	<div class="form-check"><input type="checkbox" name="teamChoice[]" class="form-check-input"  value="Sponsor"><label class="form-check-label">'.team_modal_teamSponsor.'</label></div>
	<div class="form-check"><input type="checkbox" name="teamChoice[]" class="form-check-input"  value="Communication"><label class="form-check-label">'.team_modal_teamCommunication.'</label></div>
	<div class="form-check"><input type="checkbox" name="teamChoice[]" class="form-check-input"  value="Logistique"><label class="form-check-label">'.team_modal_teamLogistic.'</label></div>
	<div class="form-check"><input type="checkbox" name="teamChoice[]" class="form-check-input"  value="Animation"><label class="form-check-label">'.team_modal_teamAnimation.'</label></div>
	<div class="form-check"><input type="checkbox" name="teamChoice[]" class="form-check-input"  value="Technique" /><label class="form-check-label">'.team_modal_teamTechnical.'</label></div>
</div>
<div class="form-group">
	<p class="form-label">'.message.required_field.'</p>
	<textarea name="message" class="form-control" rows="3" placeholder="'.team_modal_motivation.'" required></textarea>
</div>
');

?>