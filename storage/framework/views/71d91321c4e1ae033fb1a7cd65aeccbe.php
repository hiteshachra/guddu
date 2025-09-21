<?php $__env->startSection('content'); ?>
      <div class="app-chat card overflow-hidden">
          <div class="row g-0">
              <!-- Chat & Contacts -->
                <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
                    <div class="sidebar-header h-px-75 px-5 border-bottom d-flex align-items-center">
                      <div class="d-flex align-items-center me-6 me-lg-0">
                        <h5 class="text-primary mb-0">Lead Details</h5>
                      </div>
                      <i class="icon-base ti tabler-x icon-lg cursor-pointer position-absolute top-50 end-0 translate-middle d-lg-none d-block" data-overlay data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                    </div>
                  <div class="sidebar-body">
                    <!-- Chats -->
                    <ul class="list-unstyled chat-contact-list py-2 mb-0" id="chat-list">
                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Name :</span>
                        <span><?php echo e($lead->user_name); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Email :</span>
                        <span><?php echo e($lead->email); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Phone :</span>
                        <span><?php echo e($lead->phone); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Company Name :</span>
                        <span><?php echo e($lead->company_name); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Address :</span>
                        <span><?php echo e($lead->address); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Source :</span>
                        <span><?php echo e($lead->source); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0 " style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Description :</span>
                        <span><?php echo e($lead->source_description); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Assigned To :</span>
                        <span><?php echo e($lead->user->name); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Assigned Date :</span>
                        <span><?php echo e($lead->assigned_date); ?></span>
                      </li>

                      <li class="chat-contact-list-item chat-list-item-0" style="margin-block: unset;padding-block: unset;align-items: flex-start;">
                        <span class="h6 me-1">Status :</span>
                        <span class="badge bg-label-success"><?php echo e($lead->status); ?></span>
                      </li>

                    </ul>
                    <!-- Contacts -->

                  </div>
                </div>
                <!-- /Chat contacts -->

              <!-- Chat History -->
              <div class="col app-chat-history d-block" id="app-chat-history">
                  <div class="chat-history-wrapper">
                    <div class="chat-history-header border-bottom">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex overflow-hidden align-items-center">
                          <i
                            class="icon-base ti tabler-menu-2 icon-lg cursor-pointer d-lg-none d-block me-4"
                            data-bs-toggle="sidebar"
                            data-overlay
                            data-target="#app-chat-contacts"></i>
                          <div class="flex-shrink-0 avatar avatar-online">                              
                            <img
                              src="<?php echo e(asset('images/user-1.svg')); ?>"
                              alt="Avatar"
                              class="rounded-circle"
                              data-bs-toggle="sidebar"
                              data-overlay
                              data-target="#app-chat-sidebar-right" />
                          </div>
                          <div class="chat-contact-info flex-grow-1 ms-4">
                            <h6 class="m-0 fw-normal"><?php echo e($lead->user_name); ?></h6>
                            <small class="user-status text-body"><?php echo e($lead->company_name); ?></small>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <span
                            class="btn btn-text-secondary cursor-pointer d-sm-inline-flex d-none me-1 btn-icon rounded-pill">
                            <i class="icon-base ti tabler-arrow-left-dashed icon-22px"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                      <div class="chat-history-body" id="chat-container">
                          <ul class="list-unstyled chat-history" id="chat-history">
                            <?php echo $__env->make('CRM.leads.partials.follow-up-messages', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
                          </ul>
                      </div>

                      <!-- Chat message form -->
                      <div class="chat-history-footer shadow-xs">
                          <form class="form-send-message" action="<?php echo e(route('lead_follow_up',[$lead->id])); ?>" method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <div class=" d-flex justify-content-between align-items-center">
                                <input class="form-control message-input border-0 me-4 shadow-none" placeholder="Type your message here..." name="message" required/>
                              </div>
                              <hr class="m-2">
                              <div class="d-flex justify-content-between align-items-center">
                                <select class="form-select message-input border-0 shadow-none" data-style="btn-default" id="follow_up_type" name="follow_up_type" aria-label="Select Type" required>
                                    <option value="" <?php if(old('follow_up_type') == ''): echo 'selected'; endif; ?> disabled>Select Followup Type</option>
                                    <option value="Call" <?php if(old('follow_up_type') == 'Call'): echo 'selected'; endif; ?>>Call</option>
                                    <option value="Email" <?php if(old('follow_up_type') == 'Email'): echo 'selected'; endif; ?>>Email</option>
                                    <option value="Meeting" <?php if(old('follow_up_type') == 'Meeting'): echo 'selected'; endif; ?>>Meeting</option>
                                    <option value="Note" <?php if(old('follow_up_type') == 'Note'): echo 'selected'; endif; ?>>Note</option>
                                    <option value="Visit" <?php if(old('follow_up_type') == 'Visit'): echo 'selected'; endif; ?>>Visit</option>
                                    <option value="Other" <?php if(old('follow_up_type') == 'Other'): echo 'selected'; endif; ?>>Other</option>
                                </select>
                                <input type="datetime-local" class="form-control message-input border-0 shadow-none" name="activity_time" required/>
                                <div class="message-actions d-flex align-items-center">
                                    <label for="attach-doc" class="form-label mb-0">
                                      <span class="btn btn-text-secondary btn-icon rounded-pill cursor-pointer mx-1">
                                        <i class="icon-base ti tabler-paperclip icon-22px text-heading"></i>
                                      </span>
                                      <input type="file" id="attach-doc" name="attachment_doc" hidden />
                                    </label>
                                    <button class="btn btn-primary d-flex send-msg-btn" type="submit">
                                        <span class="align-middle d-md-inline-block d-none">Send</span>
                                        <i class="icon-base ti tabler-send icon-16px ms-md-2 ms-0"></i>
                                    </button>
                                </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- /Chat History -->


          </div>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('assets/js/app-chat.js')); ?>"></script>

  <script>
    let loading = false;
    const chatContainer = document.getElementById('chat-container');
    const chatHistory = document.getElementById('chat-history');

    chatContainer.addEventListener('scroll', function () {
        if (chatContainer.scrollTop === 0 && !loading) {
            loading = true;

            const firstMessage = chatHistory.querySelector('li');
            const beforeId = firstMessage?.dataset?.id;

            const oldScrollHeight = chatContainer.scrollHeight;

            fetch(`/follow-up/<?php echo e($lead->id); ?>?before_id=${beforeId}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(res => res.text())
                .then(data => {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data;
                    const newMessages = tempDiv.querySelectorAll('li');

                    newMessages.forEach(msg => {
                        chatHistory.insertBefore(msg, chatHistory.firstChild);
                    });

                    const newScrollHeight = chatContainer.scrollHeight;
                    chatContainer.scrollTop = newScrollHeight - oldScrollHeight;

                    loading = false;
                })
                .catch(() => loading = false);
        }
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/CRM/leads/follow_up.blade.php ENDPATH**/ ?>