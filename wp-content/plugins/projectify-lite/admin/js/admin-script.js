jQuery(document).ready(function () {
    "use strict";

    /* functions */
    var get_datatable_script = function( selector ) {
		jQuery( selector ).DataTable();
	}
	var get_datepicker = function( selector ){
		if ( jQuery( selector ).length ) {
		    jQuery( selector ).datetimepicker({
			    useCurrent: true,
			    format: "L",
			    showTodayButton: false,
			    icons: {
			      next: "fa fa-chevron-right",
			      previous: "fa fa-chevron-left",
			      today: 'todayText',
			    }
			});
		}
	}

	var UploadImage = function( selector, target ) {
		jQuery(document).on( 'click', selector, function (e) {
	        e.preventDefault();
	        jQuery('body').addClass('modal-open');
	        var button = this;
	        var image  = wp.media({
	            title: 'Upload Image',
	            multiple: false
	        }).open().on('select', function (e) {
	            var uploaded_image = image.state().get('selection').first();
	            var location_image = uploaded_image.toJSON().url;
	            jQuery( '#profile_avatar' ).val( location_image );
	            jQuery( '.image-input-wrapper').css( 'background-image', 'url(' + location_image + ')' );
	            jQuery( '.image-input [data-action="cancel"]').css( 'display', 'block' );
	        });
	    });
	}

	var UploadLogo = function( selector, target ) {
		jQuery(document).on( 'click', selector, function (e) {
	        e.preventDefault();
	        jQuery('body').addClass('modal-open');
	        var button = this;
	        var image  = wp.media({
	            title: 'Upload Image',
	            multiple: false
	        }).open().on('select', function (e) {
	            var uploaded_image = image.state().get('selection').first();
	            var location_image = uploaded_image.toJSON().url;
	            jQuery( target ).val( location_image );
	        });
	    });
	}

	var AddTasks = function( selector, type ) {
		jQuery(document).on( "click", selector, function(e) {
			e.preventDefault();
			var mid,tid = '';
			if ( type == 'task' ) {
				mid = jQuery( this ).attr('data-milestone');
				jQuery( '#AddTaskForm #milestone_id' ).val( mid );
			} else if ( type == 'stask' ) {
				mid = jQuery( this ).attr('data-milestone');
				tid = jQuery( this ).attr('data-task');
				jQuery( '#AddsubtaskForm #milestone_id' ).val( mid );
				jQuery( '#AddsubtaskForm #task_id' ).val( tid );
			}
		});
	}

	var SaveFormDetails = function( selector, action, form, modalID = null, refresh = null ) {
		jQuery(document).on( "click", selector, function(e) {
			e.preventDefault();
			var nounce = ajax_admin.btpjy_nonce;
			jQuery.ajax({
				url: ajax_admin.ajax_url,
				type: "POST",
				data: {
					action: action,
					nounce: nounce,
					data: jQuery( form ).serializeArray()
				},
				success: function(response) {
					if (response) {
						if ( response.status == "error" ) {
							toastr.error( response.message );
						} else {
							toastr.success( response.message );
							if ( jQuery( modalID ).length ) {
								jQuery( modalID ).modal( "hide" );
							}
							jQuery( form )[0].reset();
							if ( refresh == true ) {
								location.reload();
							}
						}
					}
				}
			});
		});
	}

	var EditFormDetails = function( selector, action, form, modalID, type = null ) {
		jQuery(document).on( "click", selector, function(e) {
			e.preventDefault();
			var nounce = ajax_admin.btpjy_nonce;
			var id     = jQuery( this ).attr('data-id');
			jQuery.ajax({
				url: ajax_admin.ajax_url,
				type: "POST",
				data: {
					action: action,
					nounce: nounce,
					id:id
				},
				success: function(response) {
					if (response) {
						if ( response.status == "error" ) {
							toastr.error( response.message );
						} else {
							toastr.success( response.message );
							jQuery( modalID ).modal( "show" );
							for ( var i = 0, l = response.inputs.length; i < l; i++ ) {
								if ( response.inputs[i] == 'edit_comment' ) {
									tinyMCE.get( response.inputs[i] ).setContent( response.values[i] );
									jQuery( '#edit-placeholder_btpjy' ).append( response.mfiles );
								} else {
									jQuery( form ).find( response.inputs[i] ).val( response.values[i] );
									jQuery( '.selectpicker' ).selectpicker( 'refresh' );
								}
							}
						}
					}
				}
			});
			
			
		});
	}

	var DeleteEntities = function( selector, action, type = null ) {
		jQuery(document).on( 'click', selector, function (e) {
	        e.preventDefault();
	        var id     = jQuery( this ).attr( 'data-id' );
	        var nounce = ajax_admin.btpjy_nonce;
	        var table, pid, tid, mid  = '';

	        if ( type.length != undefined ) {
	        	table = jQuery( this ).attr( 'data-table' );
	        }

	        try {
	        	var pid = jQuery( this ).attr( 'data-pid' );
	        	var tid = jQuery( this ).attr( 'data-tid' );
	        } catch {

	        }

			jQuery.ajax({
				url: ajax_admin.ajax_url,
				type: "POST",
				data: {
					action: action,
					nounce: nounce,
					id: id,
					table: table,
					pid: pid,
					tid: tid,
				},
				success: function(response) {
					if (response) {
						if ( response.status == "error" ) {
							toastr.error( response.message );
						} else {
							toastr.success( response.message );
							if ( table == 'btpjy_projects' || table == 'btpjy_teams' || table == 'btpjy_announcements' ) {
								var url = window.location.replace( response.url );
							} else {
								location.reload();
							}
						}
					}
				}
			});
	    });
	}

	var SaveEntries = function save( selector, form = null, modal = null, reset = null, refresh = null ) {
        jQuery(form).ajaxForm({
            success: function ( response ) {
                jQuery(selector).prop('disabled', false);
                if (response.success) {
                    jQuery('span.text-danger').remove();
                    jQuery(".is-valid").removeClass("is-valid");
                    jQuery(".is-invalid").removeClass("is-invalid");
                    toastr.success(response.data.message);

                    if ( jQuery( modal ).length ) {
                    	try{
                    		jQuery( modal ).modal( "hide" );
                    	} catch {

                    	}
					}
					if ( reset == true ) {
						jQuery( form )[0].reset();
					}
					if ( refresh == true ) {
						location.reload();
					}

                } else {
                    jQuery('span.text-danger').remove();
                    if (response.data && jQuery.isPlainObject(response.data)) {
                        jQuery(form + ' :input').each(function () {
                            var input = this;
                            jQuery(input).removeClass('is-valid');
                            jQuery(input).removeClass('is-invalid');
                            if (response.data[input.name]) {
                                var errorSpan = '<span class="text-danger">' + response.data[input.name] + '</span>';
                                jQuery(input).addClass('is-invalid');
                                jQuery(errorSpan).insertAfter(input);
                            } else {
                                jQuery(input).addClass('is-valid');
                            }
                        });
                        toastr.error(response.data.message);
                    } else {
                        var errorSpan = '<span class="text-danger">' + response.data + '<hr></span>';
                        jQuery(errorSpan).insertBefore(form);
                        toastr.error(response.data.message);
                    }
                }
            },
            error: function (response) {
                jQuery(selector).prop('disabled', false);
                toastr.error(response.statusText);
            }
        });
    }

	/* Scripts to upload media file */
    var uploadimage = new UploadImage( '.upload-image-btn' );
    var uploadimage = new UploadLogo( '.upload-logo-btn', '#company_logo' );

    /* Scripts for datatables */
    var datatable = new get_datatable_script( '#members-listing' );

    /* Date picker */
	var datepicker = new get_datepicker( "#AddTaskForm #t_start" );
	var datepicker = new get_datepicker( "#AddTaskForm #t_end" );
	var datepicker = new get_datepicker( "#EditTaskForm #t_start" );
	var datepicker = new get_datepicker( "#EditTaskForm #t_end" );
	var datepicker = new get_datepicker( "#AddProjectsForm #starting_date" );
	var datepicker = new get_datepicker( "#AddProjectsForm #due_date" );
	var datepicker = new get_datepicker( "#EditProjectsForm #starting_date" );
	var datepicker = new get_datepicker( "#EditProjectsForm #due_date" );

    /* Save Entities */
    var saveMembers  = new SaveEntries( '#AddMembersBtn', '#AddMembersForm', '', true, true );
    var editMembers  = new SaveEntries( '#EditMembersBtn', '#EditMembersForm', '', true, true );
    var saveTeams    = new SaveEntries( '#AddTeamsBtn', '#AddTeamsForm', '', true, true );
    var editTeams    = new SaveEntries( '#EditTeamsBtn', '#EditTeamsForm', '', true, true );
    var saveprojects = new SaveEntries( '#AddProjectsBtn', '#AddProjectsForm', '', true, true );
    var editprojects = new SaveEntries( '#EditProjectsBtn', '#EditProjectsForm', '', true, true );
    var saveTasks    = new SaveEntries( '#AddTaskBtn', '#AddTaskForm', '#AddTaskModal', true, true );
	var editTasks    = new SaveEntries( '#EditTaskBtn', '#EditTaskForm', '#EditTaskModal', true, true );
    var saveannounce = new SaveEntries( '#AddAnnouncementBtn', '#AddAnnouncementForm', '', true, true );
    var editannounce = new SaveEntries( '#EditAnnouncementBtn', '#EditAnnouncementForm', '', true, true );

    /* Settings */
    var savesettings = new SaveEntries( '#GeneralSettingBtn', '#GeneralSettingForm' );
    var savesettings = new SaveEntries( '#EmailTemplateBtn', '#EmailTemplateForm' );
    var savesettings = new SaveEntries( '#SaveEmailSettingsBtn', '#btpjy-template-form' );
    var savesettings = new SaveEntries( '#AddContactBtn', '#AddContactForm', '', true, true );

    var editprojects = new SaveEntries( '#AddCommentBtn', '#AddCommentForm', '', true, true );
    var editprojects = new SaveEntries( '#EditCommentBtn', '#EditcommentForm', '', true, true );
    var editprojects = new SaveEntries( '#AddMessageBtn', '#AddMessageForm', '#AddMessageModal', true, true );
    var editprojects = new SaveEntries( '#AddBugsBtn', '#AddBugsForm', '#AddBugsModal', true, true );
    var editprojects = new SaveEntries( '#EditBugsBtn', '#EditBugsForm', '', true, true );
    var editprojects = new SaveEntries( '#AddDepartmentBtn', '#AddDepartmentForm', '#AddDepartmentModal', true, true );
    var editprojects = new SaveEntries( '#AddFilesBtn', '#AddFilesForm', '#AddFilesModal', true, true );

    /* Scripts to save form details */
    var SaveTasks = new AddTasks( '.addtaska', 'task' );

    /* Delete Entities */
    var deletestask   = new DeleteEntities( '.delete-entities', 'btpjy_delete_tasks_details', 'task' );

    /* Edit Entries */
    var EditSubtasks = new EditFormDetails( '.fetch-task-entities', 'btpjy_fetch_tasks', '#EditTaskForm', '#EditdTaskModal', '' );
    var EditSubtasks = new EditFormDetails( '.fetch-comment-entities', 'btpjy_fetch_comment', '#EditcommentForm', '#EditcommentModal', '' );

    jQuery(document).on( "select change", '#select_project_id', function(e) {
		e.preventDefault();
		var id     = jQuery( this ).val();
		var nounce = ajax_admin.btpjy_nonce;
		jQuery.ajax({
			url: ajax_admin.ajax_url,
			type: "POST",
			data: {
				action: 'btpjy_select_project',
				nounce: nounce,
				id: id
			},
			success: function(response) {
				if (response) {
					if ( response.status == "error" ) {
						toastr.error( response.message );
					} else {
						toastr.success( response.message );
						jQuery( '#select_t_assingee' ).empty();
						jQuery( '#select_t_assingee' ).append( response.assignee );
						jQuery('.selectpicker').selectpicker('refresh');
					}
				}
			}
		});
	});

	jQuery(document).on( "select change", '#AddMembersForm #user_id', function(e) {
		e.preventDefault();
		var id     = jQuery( this ).val();
		var nounce = ajax_admin.btpjy_nonce;
		jQuery.ajax({
			url: ajax_admin.ajax_url,
			type: "POST",
			data: {
				action: 'btpjy_fetch_member',
				nounce: nounce,
				id: id
			},
			success: function(response) {
				if (response) {
					if ( response.status == "error" ) {
						toastr.error( response.message );
					} else {
						toastr.success( response.message );
						jQuery( '#AddMembersForm #firstname' ).val( response.first );
						jQuery( '#AddMembersForm #lastname' ).val( response.last );
						jQuery( '#AddMembersForm #username' ).val( response.login );
						jQuery( '#AddMembersForm #email' ).val( response.email );
					}
				}
			}
		});
	});
	jQuery(document).on( "select change", '#progress', function(e) {
		e.preventDefault();
		var value  = jQuery( this ).val();
		var pid    = jQuery( '#projectid' ).val();
		var nounce = ajax_admin.btpjy_nonce;
		jQuery.ajax({
			url: ajax_admin.ajax_url,
			type: "POST",
			data: {
				action: 'btpjy_set_project_progress',
				nounce: nounce,
				value: value,
				pid: pid
			},
			success: function(response) {
				if (response) {
					if ( response.status == "error" ) {
						toastr.error( response.message );
					} else {
						toastr.success( response.message );
						location.reload();						
					}
				}
			}
		});
	});

	jQuery(document).on( "click", '#next-step-three', function(e) {
		e.preventDefault();
		var type = jQuery( this ).attr( 'data-type' );

		if ( type == 'member' ) {
			var first   = jQuery( '#firstname' ).val();
			var last    = jQuery( '#lastname' ).val();
			var email   = jQuery( '#email' ).val();
			var phone   = jQuery( '#phone' ).val();
			var desig   = jQuery( '#designation' ).val();

			jQuery( '#firstname-span' ).empty();
			jQuery( '#lastname-span' ).empty();
			jQuery( '#email-span' ).empty();
			jQuery( '#phone-span' ).empty();
			jQuery( '#desig-span' ).empty();

			jQuery( '#firstname-span' ).append( first );
			jQuery( '#lastname-span' ).append( last );
			jQuery( '#email-span' ).append( email );
			jQuery( '#phone-span' ).append( phone );
			jQuery( '#desig-span' ).append( desig );
		} else if ( type == 'project' ) {
			var title   = jQuery( '#title' ).val();
			var desc    = jQuery( '#description' ).val();
			var start   = jQuery( '#starting_date' ).val();
			var due     = jQuery( '#due_date' ).val();
			var deposit = jQuery( '#deposit_amnt' ).val();

			jQuery( '#title-span' ).empty();
			jQuery( '#desc-span' ).empty();
			jQuery( '#start-span' ).empty();
			jQuery( '#due-span' ).empty();
			jQuery( '#deposit-span' ).empty();

			jQuery( '#title-span' ).append( title );
			jQuery( '#desc-span' ).append( desc );
			jQuery( '#start-span' ).append( start );
			jQuery( '#due-span' ).append( due );
			jQuery( '#deposit-span' ).append( deposit );
		}
	});

	jQuery(document).on( 'click', '#upload-btn-btpjy', function (e) {
        e.preventDefault();
        jQuery('body').addClass('modal-open');
        var image = wp.media({ 
            title: 'Upload Image',
            multiple: true
        }).open()
        .on('select', function(e){
            var uploaded_image = image.state().get('selection').map(
              function( attachment ) {
                    attachment.toJSON();
                    return attachment;
            });
            jQuery('#AddCommentForm #myplugin-placeholder_btpjy').empty();
            for (var i = 0; i < uploaded_image.length; i++) {
                jQuery('#AddCommentForm #myplugin-placeholder_btpjy').append(
                    '<div class="myplugin-image-previeww"><img src="' + 
                    uploaded_image[i].attributes.url + '" >'
                    );
                jQuery('#AddCommentForm #myplugin-placeholder_btpjy').append(
                    '<input type="hidden" name="media[]"  value="' + uploaded_image[i].attributes.url + '"></div>' 
                    );
            }
            jQuery( 'body' ).addClass( 'modal-open' );
        });
    });

    jQuery(document).on( 'click', '#upload-btn-files', function (e) {
        e.preventDefault();
        jQuery('body').addClass('modal-open');
        var image = wp.media({ 
            title: 'Upload Image',
            multiple: true
        }).open()
        .on('select', function(e){
            var uploaded_image = image.state().get('selection').map(
              function( attachment ) {
                    attachment.toJSON();
                    return attachment;
            });
            jQuery('#AddFilesForm #files-placeholder_btpjy').empty();
            for (var i = 0; i < uploaded_image.length; i++) {
                jQuery('#AddFilesForm #files-placeholder_btpjy').append(
                    '<div class="myplugin-image-previeww"><img src="' + 
                    uploaded_image[i].attributes.url + '" >'
                    );
                jQuery('#AddFilesForm #files-placeholder_btpjy').append(
                    '<input type="hidden" name="media[]"  value="' + uploaded_image[i].attributes.url + '"></div>' 
                    );
            }
            jQuery( 'body' ).addClass( 'modal-open' );
        });
    });

    jQuery(document).on( 'click', '#edit-upload-btn-btpjy', function (e) {
        e.preventDefault();
        jQuery('body').addClass('modal-open');
        var image = wp.media({ 
            title: 'Upload Image',
            multiple: true
        }).open()
        .on('select', function(e){
            var uploaded_image = image.state().get('selection').map(
              function( attachment ) {
                    attachment.toJSON();
                    return attachment;
            });
            jQuery('#EditcommentForm #edit-placeholder_btpjy').empty();
            for (var i = 0; i < uploaded_image.length; i++) {
               jQuery('#EditcommentForm #edit-placeholder_btpjy').append(
                    '<div class="myplugin-image-previeww"><img src="' + 
                    uploaded_image[i].attributes.url + '" >'
                    );
                jQuery('#EditcommentForm #edit-placeholder_btpjy').append(
                    '<input type="hidden" name="media[]"  value="' + uploaded_image[i].attributes.url + '"></div>' 
                    );
            }
            jQuery( 'body' ).addClass( 'modal-open' );
        });
    });

    jQuery(document).on( "select change", '#AddFilesForm #related_to', function(e) {
		e.preventDefault();
		var value = jQuery( this ).val();

		if ( value == 'task' ) {
			jQuery( '#task_form_group' ).css( 'display', 'flex' );
			jQuery( '#subtask_form_group' ).hide();
		} else {
			jQuery( '#task_form_group' ).hide();
			jQuery( '#subtask_form_group' ).hide();
		}

	});

	jQuery(document).on( "select change", '#AddMembersForm #entry', function(e) {
		e.preventDefault();
		var value = jQuery( this ).val();
		if ( value == 'new' ) {
			jQuery( '#AddMembersForm #select-member-div' ).hide();
		} else {
			jQuery( '#AddMembersForm #select-member-div' ).show();
		}
	});


    jQuery(document).on( "click", '.image-input [data-action="cancel"]', function(e) {
		e.preventDefault();
		jQuery( '#btpjy_user_add_avatar .image-input-wrapper').css( 'background-image', 'url()' );
		jQuery( '.image-input [data-action="cancel"]').css( 'display', 'none' );
	});

    jQuery(document).on( "click", '#next-step-one', function(e) {
		e.preventDefault();
		jQuery( '#wizard-step-one' ).attr( 'data-wizard-state', 'done' );
		jQuery( '#wizard-step-two' ).attr( 'data-wizard-state', 'current' );

		jQuery( '#member-fields-panel-one' ).attr( 'data-wizard-state', '' );
		jQuery( '#member-fields-panel-two' ).attr( 'data-wizard-state', 'current' );

	});

	jQuery(document).on( "click", '#prev-step-two', function(e) {
		e.preventDefault();
		jQuery( '#wizard-step-one' ).attr( 'data-wizard-state', 'current' );
		jQuery( '#wizard-step-two' ).attr( 'data-wizard-state', 'pending' );

		jQuery( '#member-fields-panel-one' ).attr( 'data-wizard-state', 'current' );
		jQuery( '#member-fields-panel-two' ).attr( 'data-wizard-state', '' );

	});

	jQuery(document).on( "click", '#next-step-two', function(e) {
		e.preventDefault();
		jQuery( '#wizard-step-two' ).attr( 'data-wizard-state', 'done' );
		jQuery( '#wizard-step-three' ).attr( 'data-wizard-state', 'current' );

		jQuery( '#member-fields-panel-two' ).attr( 'data-wizard-state', '' );
		jQuery( '#member-fields-panel-three' ).attr( 'data-wizard-state', 'current' );

	});

	jQuery(document).on( "click", '#prev-step-three', function(e) {
		e.preventDefault();
		jQuery( '#wizard-step-two' ).attr( 'data-wizard-state', 'current' );
		jQuery( '#wizard-step-three' ).attr( 'data-wizard-state', 'pending' );

		jQuery( '#member-fields-panel-two' ).attr( 'data-wizard-state', 'current' );
		jQuery( '#member-fields-panel-three' ).attr( 'data-wizard-state', '' );

	});

	jQuery(document).on( "click", '#next-step-three', function(e) {
		e.preventDefault();
		jQuery( '#wizard-step-three' ).attr( 'data-wizard-state', 'done' );
		jQuery( '#wizard-step-four' ).attr( 'data-wizard-state', 'current' );

		jQuery( '#member-fields-panel-three' ).attr( 'data-wizard-state', '' );
		jQuery( '#member-fields-panel-four' ).attr( 'data-wizard-state', 'current' );

	});

	jQuery(document).on( "click", '#prev-step-four', function(e) {
		e.preventDefault();
		jQuery( '#wizard-step-three' ).attr( 'data-wizard-state', 'current' );
		jQuery( '#wizard-step-four' ).attr( 'data-wizard-state', 'pending' );

		jQuery( '#member-fields-panel-three' ).attr( 'data-wizard-state', 'current' );
		jQuery( '#member-fields-panel-four' ).attr( 'data-wizard-state', '' );

	});

	jQuery(document).on( "click", '#btpjy-template-form #email_enable', function() {
		var value = jQuery(this).val();
		if ( jQuery( this ).is( ":checked" ) ) {
		  jQuery('.email_hide_class').css( 'display', 'block' );
		} else {
			jQuery('.email_hide_class').css( 'display', 'none' );
			jQuery('.row.smtp_row.visible_row_api').css( 'display', 'none' );
		}
	});

});