(function($) {

    'use strict';

    /**
     * Toggle Checkbox
     *
     * <input type="hidden" name="my-checkbox" data-input="unique_name" value="0" />
     * <label class="input-checkbox-label">
     *     <span class="input-checkbox" data-input="unique_name"></span>
     *     Remember Me?
     * </label>
     */
    function ToggleCheckBox(element){

        this.$element = $(element);
        this.uniqueID = this.getElementID();
        this.$input = this.$element.siblings('input');
        this.toggleValue = (this.$input.val() == 0) ? 1 : 0;
        this.disabled = this.isDisabled();
        this.active = this.isActive();
            
            console.log(this.disabled);
        if(this.disabled) {
            this.$element.addClass('disabled');
        }
        
        if(this.active == 1) {
            this.$element.children('span').addClass('active');
        }

        this.bindEvents();
    }
    
    ToggleCheckBox.prototype.isDisabled = function() {
        return typeof this.$input.attr('disabled') !== "undefined";
    }
    
    ToggleCheckBox.prototype.isActive = function() {
        return this.$input.val();
    }

    ToggleCheckBox.prototype.bindEvents = function() {

        var self = this;

        self.$element.on('click', function(e) {
            self.setStatus(self.toggleValue);
        });
    }

    ToggleCheckBox.prototype.getElementID = function() {
        this.$element.children('span').attr('data-input');
    }

    ToggleCheckBox.prototype.setStatus = function(status) {
        if(this.disabled) {
            return false;
        }
        this.$input.val(status);
        this.$element.find('.input-checkbox').toggleClass('active');
    }

    $.fn.toggleCheckBox = function() {
        return this.each(function() {
            new ToggleCheckBox(this);
        });
    }

    $(document).ready(function() {
        $('.input-checkbox-label').toggleCheckBox();
    });
})(jQuery);