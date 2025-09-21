<?php $__env->startSection('content'); ?>
    <!-- Basic Layout -->
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add (<?php echo e(ucfirst($type)); ?>)</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('add_user', $type)); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="fullname">Full Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="fullname2" class="input-group-text"><i
                                                class="icon-base ti tabler-user"></i></span>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            placeholder="John Doe" aria-label="John Doe" required
                                            value="<?php echo e(old('fullname')); ?>" aria-describedby="fullname2" />
                                    </div>
                                    <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="email">Email<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="icon-base ti tabler-mail"></i></span>
                                        <input type="text" id="email" name="email" class="form-control"
                                            placeholder="john.doe@gmail.com" aria-label="john.doe@gmail.com"
                                            aria-describedby="email2" required value="<?php echo e(old('email')); ?>" />
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="phone">Phone No.<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="phone2" class="input-group-text"><i
                                                class="icon-base ti tabler-phone"></i></span>
                                        <input type="text" id="phone" name="phone"
                                            class="form-control phone-mask" placeholder="9865474584"
                                            aria-label="9865474584" aria-describedby="phone2" required
                                            value="<?php echo e(old('phone')); ?>" />
                                    </div>
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="father_name">Father Name</label>
                                    <div class="input-group input-group-merge">
                                        <span id="father_name2" class="input-group-text"><i
                                                class="icon-base ti tabler-user"></i></span>
                                        <input type="text" class="form-control" id="father_name" name="father_name"
                                            value="<?php echo e(old('father_name')); ?>" placeholder="John Doe"
                                            aria-label="John Doe" aria-describedby="father_name2" />
                                    </div>
                                    <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="mother_name">Mother Name</label>
                                    <div class="input-group input-group-merge">
                                        <span id="mother_name2" class="input-group-text"><i
                                                class="icon-base ti tabler-user"></i></span>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name"
                                            placeholder="John Doe" aria-label="John Doe"
                                            value="<?php echo e(old('mother_name')); ?>" aria-describedby="mother_name2" />
                                    </div>
                                    <?php $__errorArgs = ['mother_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="password">Password<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="password2" class="input-group-text"><i
                                                class="icon-base ti tabler-lock"></i></span>
                                        <input type="text" class="form-control" id="password" name="password"
                                            required placeholder="*******" aria-label="*******"
                                            aria-describedby="password2" />
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>



                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="dob">DOB<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="dob2" class="input-group-text"><i
                                                class="icon-base ti tabler-calendar"></i></span>
                                        <input class="form-control" type="date" value="<?php echo e(old('dob')); ?>"
                                            id="flatpickr-date" name="dob" required />
                                    </div>
                                    <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                    <select class="selectpicker w-100" data-style="btn-default" id="gender" name="gender"
                                        aria-label="Select Gender" required>
                                        <option value="Male" <?php if(old('gender') == 'Male'): echo 'selected'; endif; ?>>Male</option>
                                        <option value="Female" <?php if(old('gender') == 'Female'): echo 'selected'; endif; ?>>Female</option>
                                        <option value="Other" <?php if(old('gender') == 'Other'): echo 'selected'; endif; ?>>Other</option>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="profile_image" class="form-label">Profile Image</label>
                                    <input class="form-control" type="file" id="profile_image"
                                        name="profile_image" accept="image/*" />
                                </div>
                                <?php $__errorArgs = ['profile_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>



                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Address Details</h5>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="country" class="form-label">Country<span class="text-danger">*</span></label>
                                    <select class="form-select select2" id="country" name="country"
                                        onchange="getStates(this.value)" aria-label="Select Country" required>
                                        <option value="" selected>Select Country</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>" <?php if(old('country') == $country->id): echo 'selected'; endif; ?>>
                                                <?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                                    <select class="form-select select2" id="state" name="state" required
                                        onchange="getCities(this.value)" aria-label="Select State">
                                        <option value="">Select State</option>

                                    </select>
                                </div>
                                <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="city" class="form-label">City<span class="text-danger">*</span></label>
                                    <select class="form-select select2" id="city" name="city"
                                        aria-label="Select City" required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="zipcode">Zip Code<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="zipcode2" class="input-group-text"><i
                                                class="icon-base ti tabler-location"></i></span>
                                        <input type="text" id="zipcode" name="zipcode"
                                            class="form-control phone-mask" placeholder="123456" aria-label="123456"
                                            aria-describedby="zipcode2" required value="<?php echo e(old('zipcode')); ?>" />
                                    </div>
                                    <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-6">
                                    <label class="form-label" for="address">Address<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <textarea id="address" name="address" class="form-control" placeholder="Address" aria-label="Address"
                                            aria-describedby="address2"><?php echo e(old('address')); ?></textarea>
                                    </div>
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Banks Details</h5>
                            </div>


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="bank" class="form-label">Bank<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select select2" id="bank" name="bank"
                                        aria-label="Select Bank" required>
                                        <option value="" selected>Select Bank</option>
                                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($bank->id); ?>" <?php if(old('bank') == $bank->id): echo 'selected'; endif; ?>>
                                                <?php echo e($bank->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="name_at_bank">Name at Bank<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="name_at_bank2" class="input-group-text"><i
                                                class="icon-base ti tabler-user"></i></span>
                                        <input type="text" id="name_at_bank" name="name_at_bank" class="form-control"
                                            placeholder="John Doe" aria-label="John Doe" required
                                            value="<?php echo e(old('name_at_bank')); ?>" />
                                    </div>
                                    <?php $__errorArgs = ['name_at_bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="account_number">Account Number</label>
                                    <div class="input-group input-group-merge">
                                        <span id="account_number2" class="input-group-text"><i
                                                class="icon-base ti tabler-wallet"></i></span>
                                        <input type="text" id="account_number" name="account_number"
                                            class="form-control phone-mask" placeholder="123456789"
                                            aria-label="123456789" aria-describedby="account_number2"
                                            value="<?php echo e(old('account_number')); ?>" required />
                                    </div>
                                    <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="ifsc">IFSC Code</label>
                                    <div class="input-group input-group-merge">
                                        <span id="ifsc2" class="input-group-text"><i
                                                class="icon-base ti tabler-wallet"></i></span>
                                        <input type="text" id="ifsc" name="ifsc"
                                            class="form-control phone-mask" placeholder="123456" aria-label="123456"
                                            aria-describedby="ifsc2" required value="<?php echo e(old('ifsc')); ?>" />

                                    </div>
                                    <?php $__errorArgs = ['ifsc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">KYC Details</h5>
                            </div>

                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label for="proof_type" class="form-label">Proof Type<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select select2" id="proof_type" name="proof_type"
                                        aria-label="Select Proof Type" required>
                                        <option value="" selected>Select Proof Type</option>
                                        <option value="Adhaar Card" <?php if(old('proof_type') == 'Adhaar Card'): echo 'selected'; endif; ?>>Adhaar Card</option>
                                        <option value="Permanent Account Number (PAN)" <?php if(old('proof_type') == 'Permanent Account Number (PAN)'): echo 'selected'; endif; ?>>
                                            Permanent Account Number (PAN)</option>
                                        <option value="Election Commission Id Card" <?php if(old('proof_type') == 'Election Commission Id Card'): echo 'selected'; endif; ?>>
                                            Election Commission Id Card</option>
                                        <option value="Driver's License" <?php if(old('proof_type') == 'Driver\'s License'): echo 'selected'; endif; ?>>Driver's License
                                        </option>
                                        <option value="Birth Certificate" <?php if(old('proof_type') == 'Birth Certificate'): echo 'selected'; endif; ?>>Birth
                                            Certificate</option>
                                        <option value="State-issued Identification Card" <?php if(old('proof_type') == 'State-issued Identification Card'): echo 'selected'; endif; ?>>
                                            State-issued Identification Card</option>
                                        <option value="Student Identification Card" <?php if(old('proof_type') == 'Student Identification Card'): echo 'selected'; endif; ?>>
                                            Student Identification Card</option>
                                        <option value="Social Security Card" <?php if(old('proof_type') == 'Social Security Card'): echo 'selected'; endif; ?>>Social
                                            Security Card</option>
                                        <option value="Military Identification Card" <?php if(old('proof_type') == 'Military Identification Card'): echo 'selected'; endif; ?>>
                                            Military Identification Card</option>
                                        <option value="Passport Card" <?php if(old('proof_type') == 'Passport Card'): echo 'selected'; endif; ?>>Passport Card
                                        </option>

                                    </select>
                                </div>
                                <?php $__errorArgs = ['proof_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label class="form-label" for="identification_number">Identification
                                        Number<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="identification_number2" class="input-group-text"><i
                                                class="icon-base ti tabler-wallet"></i></span>
                                        <input type="text" id="identification_number" name="identification_number"
                                            class="form-control phone-mask" placeholder="123456" aria-label="123456"
                                            aria-describedby="identification_number2" required
                                            value="<?php echo e(old('identification_number')); ?>" />

                                    </div>
                                    <?php $__errorArgs = ['identification_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                                <div class="col-sm-4">
                                <div class="mb-6">
                                    <label for="identification_image" class="form-label">Identification Image<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="identification_image"
                                        name="identification_image" accept="image/*" required/>
                                </div>
                                <?php $__errorArgs = ['identification_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php if($errors->any()): ?>
        <script>
            $(document).ready(function(){
                getStates('<?php echo e(old("country")); ?>','<?php echo e(old("state")); ?>')
                getCities('<?php echo e(old("state")); ?>','<?php echo e(old("city")); ?>')
            });
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/users_list/add.blade.php ENDPATH**/ ?>