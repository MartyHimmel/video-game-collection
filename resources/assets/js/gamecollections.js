$('input[name="has_game[]"]').each(function() {
	$(this).click(function() {
		if (this.checked) {
			pushValue('input[name="add_games"]', this.value);
			removeValue('input[name="remove_games"]', this.value);
		} else {
			pushValue('input[name="remove_games"]', this.value);
			removeValue('input[name="add_games"]', this.value);
		}
	});
});

$('input[name="has_box[]"]').each(function() {
	$(this).click(function() {
		if (this.checked) {
			pushValue('input[name="add_boxes"]', this.value);
			removeValue('input[name="remove_boxes"]', this.value);
		} else {
			pushValue('input[name="remove_boxes"]', this.value);
			removeValue('input[name="add_boxes"]', this.value);
		}
	});
});

$('input[name="has_manual[]"]').each(function() {
	$(this).click(function() {
		if (this.checked) {
			pushValue('input[name="add_manuals"]', this.value);
			removeValue('input[name="remove_manuals"]', this.value);
		} else {
			pushValue('input[name="remove_manuals"]', this.value);
			removeValue('input[name="add_manuals"]', this.value);
		}
	});
});

function pushValue(selector, value) {
	var currentValues = $(selector).val();
	if (currentValues.length === 0) {
		$(selector).val(value);
		return;
	}
	currentValues = currentValues.split(',');
	var index = currentValues.indexOf(value);
	if (index > -1) {
		return;
	}
	currentValues.push(value);
	$(selector).val(currentValues.join(','));
}

function removeValue(selector, value) {
	var currentValues = $(selector).val();
	if (currentValues.length === 0) {
		return;
	}
	currentValues = currentValues.split(',');
	var index = currentValues.indexOf(value);
	if (index > -1) {
		currentValues.splice(index, 1);
	}
	$(selector).val(currentValues.join(','));
}
