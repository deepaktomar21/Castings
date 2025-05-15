@extends('website.layouts.app')

@section('title', 'Account Settings')

@section('content')

    <div class="site-section">
        <div class="container">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif


            <br>
            <br>
            {{-- <div class="row listing-body">
                <div class="col-md-8 col-12">
                    <div class="listing-container" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="listing-section">
                            <div class="listing-section__header" role="tab" id="headingOne">
                                <h2>Account Settings</h2>
                            </div>
                            <div class="setting-group">
                                <div class="setting-group__header">
                                    <h5>Basic</h5><a class="edit-link" role="button">Edit</a>
                                </div>
                                <div class="setting-group__content"><span
                                        class="setting-group__content--label">Name:</span><span
                                        class="setting-group__content--desc">Azhar Khan</span></div>
                                <div class="setting-group__content"><span
                                        class="setting-group__content--label">Email:</span><span
                                        class="setting-group__content--desc">menatwork173@gmail.com</span><button
                                        aria-label="" type="button" class="info-link" data-toggle="tooltip"
                                        data-placement="left" title=""
                                        data-original-title="You do not need to add your email address to your profile. Casting Directors can contact you directly through the Backstage messaging system.">
                                    </button></div>
                            </div>
                            <div class="setting-group">
                                <div class="setting-group__header">
                                    <h5>My Details</h5><a class="edit-link" role="button">Edit</a>
                                </div>
                                <div class="setting-group__content"><span
                                        class="setting-group__content--label">Organization:</span><span
                                        class="setting-group__content--desc">Brand / Company</span></div>
                                <div class="setting-group__content"><span class="setting-group__content--label">Job
                                        Title/Role:</span><span class="setting-group__content--desc">Manager</span></div>
                                <div class="setting-group__content"><span class="setting-group__content--label">Company
                                        Name:</span><span class="setting-group__content--desc">men at work</span></div>
                                <div class="setting-group__content"><span class="setting-group__content--label">Company
                                        Website:</span><span class="setting-group__content--desc"></span></div>
                                <div class="setting-group__content"><span class="setting-group__content--label">Professional
                                        Link:</span><span class="setting-group__content--desc"></span></div>
                                <div class="setting-group__content"><span class="setting-group__content--label">Phone
                                        Number:</span><span class="setting-group__content--desc"></span>
                                    <div class="alert-box--info small mt-15px">Your phone number is used for account
                                        verification purposes. It will only be visible to job posters if you apply to their
                                        projects, and no one else.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-container modal fade" id="accountChangePassword" role="dialog"
                        aria-labelledby="accountChangePassword" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog">
                            <form data-hs-cf-bound="true">
                                <div id="modal-content-accountChangePassword" class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <h3 class="modal-title">Change Password</h3>
                                        </div><button type="button" tabindex="-1" class="modal__btn--close"><span
                                                class="sr-only">close</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="position-relative"><label for="current_password">Current
                                                    Password<span class="tw"><span
                                                            class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                            </div>
                                            <div class="input-group"><input id="current_password" color="white"
                                                    type="password" class="form-control white" placeholder="Password"
                                                    name="current_password" data-testid="passwordInput" value=""><span
                                                    class="input-group-btn"><button title="Show password as plain text"
                                                        class="btn btn-default " type="button"></button></span></div>
                                        </div>
                                        <div class="form-group password--strength">
                                            <div class="position-relative"><label for="password" class="undefinedd-flex">New
                                                    Password<span class="tw"><span
                                                            class="tw-text-md tw-relative -tw-top-1">*</span></span>
                                                    <div class="d-flex flex-grow-1">
                                                        <div class="tooltip-link ml-auto">Use a Passphrase</div>
                                                    </div>
                                                </label></div>
                                            <div class="input-group"><input id="password" color="white" type="password"
                                                    class="form-control white" placeholder="Password" name="password"
                                                    data-testid="passwordInput" value=""><span
                                                    class="input-group-btn"><button title="Show password as plain text"
                                                        class="btn btn-default " type="button"></button></span></div>
                                            <div class="password-strength-counter ko">0 characters (16 minimum)</div>
                                            <div class="password--strength-meter level-5">
                                                <div class="password--strength-level level-5"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="position-relative"><label for="confirm_password">Confirm New
                                                    Password<span class="tw"><span
                                                            class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                            </div>
                                            <div class="input-group"><input id="confirm_password" color="white"
                                                    type="password" class="form-control white" placeholder="Password"
                                                    name="confirm_password" data-testid="passwordInput"
                                                    value=""><span class="input-group-btn"><button
                                                        title="Show password as plain text" class="btn btn-default "
                                                        type="button"></button></span></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="modal-footer__btns"><button type="submit"
                                                aria-label="Change Password"
                                                class="modal__btn--action btn-primary-md join">Change
                                                Password</button><button type="button" aria-label="Cancel"
                                                class="modal__btn--action btn-gray-md later">Cancel</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-container modal fade" id="accountBasicDetailsInfo" role="dialog"
                        aria-labelledby="accountBasicDetailsInfo" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog">
                            <form data-hs-cf-bound="true">
                                <div id="modal-content-accountBasicDetailsInfo" class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <h3 class="modal-title">My Details</h3>
                                        </div><button type="button" tabindex="-1" class="modal__btn--close"><span
                                                class="sr-only">close</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <div class="form-group">
                                                <div class="position-relative"><label
                                                        for="user-organization">Organization<span class="tw"><span
                                                                class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                                </div><select id="user-organization" class="select-dd gray"
                                                    aria-label="Select an option">
                                                    <option value="" disabled="" hidden="">Select
                                                        Organization</option>
                                                    <option value="Brand / Company">Brand / Company</option>
                                                    <option value="Creative / Marketing Agency">Creative / Marketing Agency
                                                    </option>
                                                    <option value="Production Company">Production Company</option>
                                                    <option value="Theater">Theater</option>
                                                    <option value="Studio / Network">Studio / Network</option>
                                                    <option value="Casting Office">Casting Office</option>
                                                    <option value="My School">My School</option>
                                                    <option value="Personal Project">Personal Project</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="position-relative"><label for="jobTitle">Job Title/Role<span
                                                            class="tw"><span
                                                                class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                                </div>
                                                <div class="css-b62m3t-container"><span id="react-select-2-live-region"
                                                        class="css-7pg0cj-a11yText"></span><span aria-live="polite"
                                                        aria-atomic="false" aria-relevant="additions text" role="log"
                                                        class="css-7pg0cj-a11yText"></span>
                                                    <div class="css-18o4z8b-control">
                                                        <div class="css-hlgwow">
                                                            <div class="css-1dimb5e-singleValue">Manager</div>
                                                            <div class="css-19bb58m" data-value=""><input class=""
                                                                    autocapitalize="none" autocomplete="off"
                                                                    autocorrect="off" id="react-select-2-input"
                                                                    spellcheck="false" tabindex="0" type="text"
                                                                    aria-autocomplete="list" aria-expanded="false"
                                                                    aria-haspopup="true" role="combobox"
                                                                    aria-activedescendant="" value=""
                                                                    style="color: inherit; background: 0px center; opacity: 1; width: 100%; grid-area: 1 / 2; font: inherit; min-width: 2px; border: 0px; margin: 0px; outline: 0px; padding: 0px;">
                                                            </div>
                                                        </div>
                                                        <div class="css-1wy0on6">
                                                            <div class="css-1dqmcf6-indicatorContainer"
                                                                aria-hidden="true">

                                                            </div><span class="css-1u9des2-indicatorSeparator"></span>
                                                            <div class="css-1dqmcf6-indicatorContainer"
                                                                aria-hidden="true">
                                                                <svg height="20" width="20" viewBox="0 0 20 20"
                                                                    aria-hidden="true" focusable="false"
                                                                    class="css-8mmkcg">
                                                                    <path
                                                                        d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div><input name="jobTitle" type="hidden" value="84">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="position-relative"><label
                                                        for="accountSettingsCompanyName">Company Name</label></div><input
                                                    id="accountSettingsCompanyName" name="accountSettingsCompanyName"
                                                    type="text" class="form-control gray" placeholder=""
                                                    aria-describedby="accountSettingsCompanyName-status"
                                                    value="men at work">
                                            </div>
                                            <div class="form-group">
                                                <div class="position-relative"><label
                                                        for="accountSettingsCompanyWebsite">Company, Production, or
                                                        Personal
                                                        Website</label></div><input id="accountSettingsCompanyWebsite"
                                                    name="accountSettingsCompanyWebsite" type="text"
                                                    class="form-control gray" placeholder=""
                                                    aria-describedby="accountSettingsCompanyWebsite-status"
                                                    value="">
                                            </div>
                                            <div class="form-group">
                                                <div class="position-relative"><label
                                                        for="accountSettingsprofessionalLink">Professional Link</label>
                                                </div><input id="accountSettingsprofessionalLink"
                                                    name="accountSettingsprofessionalLink" type="text"
                                                    class="form-control gray" placeholder=""
                                                    aria-describedby="accountSettingsprofessionalLink-status"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="position-relative"><label for="phoneNumberField">Phone
                                                    Number</label></div>
                                            <div class="input-group phone_country_code">
                                                <div class="input-group-prepend"><select name="phone_country_code"
                                                        class="select-dd gray" aria-label="Select an option">
                                                        <option value="" disabled="" hidden="">Country Code
                                                        </option>
                                                        <option value="234">US (+1)</option>
                                                        <option value="77">GB (+44)</option>
                                                        <option value="13">AU (+61)</option>
                                                        <option value="102">IE (+353)</option>
                                                        <option value="172">NZ (+64)</option>
                                                        <option value="3">AF (+93)</option>
                                                        <option value="15">AX (+358)</option>
                                                        <option value="6">AL (+355)</option>
                                                        <option value="62">DZ (+213)</option>
                                                        <option value="1">AD (+376)</option>
                                                        <option value="8">AO (+244)</option>
                                                        <option value="10">AR (+54)</option>



                                                    </select></div><input class="form-control gray" name="phone_number"
                                                    aria-label="phone_number" type="tel" value=""
                                                    inputmode="numeric">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="modal-footer__btns"><button type="submit" aria-label="Save"
                                                class="modal__btn--action btn-primary-md join">Save</button><button
                                                type="button" aria-label="Cancel"
                                                class="modal__btn--action btn-gray-md later">Cancel</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-container modal fade" id="accountBasicInfo" role="dialog"
                        aria-labelledby="accountBasicInfo" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog">
                            <form data-hs-cf-bound="true">
                                <div id="modal-content-accountBasicInfo" class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <h3 class="modal-title">Basic Info</h3>
                                        </div><button type="button" tabindex="-1" class="modal__btn--close"><span
                                                class="sr-only">close</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="position-relative"><label for="accountSettingsFirstName">First
                                                    Name<span class="tw"><span
                                                            class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                            </div><input id="accountSettingsFirstName" name="accountSettingsFirstName"
                                                type="text" class="form-control gray" placeholder=""
                                                aria-describedby="accountSettingsFirstName-status" value="Azhar">
                                        </div>
                                        <div class="form-group">
                                            <div class="position-relative"><label for="accountSettingsLastName">Last
                                                    Name<span class="tw"><span
                                                            class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                            </div><input id="accountSettingsLastName" name="accountSettingsLastName"
                                                type="text" class="form-control gray" placeholder=""
                                                aria-describedby="accountSettingsLastName-status" value="Khan">
                                        </div>
                                        <div class="form-group email-form">
                                            <div class="position-relative"><label for="accountSettingsEmail">Email<span
                                                        class="tw"><span
                                                            class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                            </div><input autocomplete="email" class="form-control" type="email"
                                                id="accountSettingsEmail" placeholder="" value="menatwork173@gmail.com">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="modal-footer__btns"><button type="submit" aria-label="Save"
                                                class="modal__btn--action btn-primary-md join">Save</button><button
                                                type="button" aria-label="Cancel"
                                                class="modal__btn--action btn-gray-md later">Cancel</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-container modal fade" id="accountProfile" role="dialog"
                        aria-labelledby="accountProfile" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog">
                            <form data-hs-cf-bound="true">
                                <div id="modal-content-accountProfile" class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <h3 class="modal-title">Profile</h3>
                                        </div><button type="button" tabindex="-1" class="modal__btn--close"><span
                                                class="sr-only">close</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="position-relative"><label for="inputSlug">Profile URL<span
                                                        class="tw"><span
                                                            class="tw-text-md tw-relative -tw-top-1">*</span></span></label>
                                            </div>
                                            <p>This is your custom Profile URL. We recommend using your stage
                                                name. You can use letters, numbers, hyphens and underscores</p>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"></span>
                                                </div>
                                                <input id="inputSlug" name="slug" type="text"
                                                    class="form-control gray" placeholder=""
                                                    aria-describedby="inputSlug-status" value="azhar-khan-3">
                                            </div>
                                        </div><a role="button" class="copy-url font-md mb-20px d-block">Copy URL</a>
                                        <div class="form-group form-radio visibility">
                                            <div class="position-relative"><label for="visibility">Profile
                                                    Visibility</label></div>
                                            <div class="radio"><input type="radio" id="visibilityV" name="visibility"
                                                    value="V"><label for="visibilityV">Private</label></div>
                                            <div class="radio"><input type="radio" id="visibilityB" name="visibility"
                                                    value="B" checked=""><label for="visibilityB">Public</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="modal-footer__btns"><button type="submit" aria-label="Save"
                                                class="modal__btn--action btn-primary-md join">Save</button><button
                                                type="button" aria-label="Cancel"
                                                class="modal__btn--action btn-gray-md later">Cancel</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="row sticky-top">
                        <div class="col-12 sidebar__col">
                            <ul class="sidebar steps">
                                <li class="sidebar__header"><a aria-current="page" class="active" href=""
                                        data-discover="true">Account Settings</a></li>
                                <li class="sidebar__header"><a href="" data-discover="true">Subscription Info</a>
                                    <div class="active-sub"><a class="badge green" href=""
                                            data-discover="true">Active</a></div>
                                </li>
                                <li class="sidebar__header"><a href="" data-discover="true">Payment &amp;
                                        Shipping</a></li>
                                <li class="sidebar__header"><a href="" data-discover="true">Notifications</a></li>
                            </ul>
                        </div>
                        <div class="col-12 sidebar__col help">
                            <div class="sidebar">
                                <p><strong>Need Help?</strong><br>You might find the answer in our <a href="">Help
                                        Center</a>, or you can <a href="">send us a message</a>.
                                    Response time is generally within 1 business day. Our support hours are M-F 10am-6pm
                                    EST.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 help-mobile">
                    <div class="row">
                        <div class="col-12 sidebar__col help">
                            <div class="sidebar">
                                <p><strong>Need Help?</strong><br>You might find the answer in our <a href="">Help
                                        Center</a>, or you can <a href="">send us a message</a>.
                                    Response time is generally within 1 business day. Our support hours are M-F 10am-6pm
                                    EST.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row listing-body">
                <div class="col-md-8 col-12">
                    <div class="listing-container" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- Account Settings Section -->
                        <div class="listing-section">
                            <div class="listing-section__header mb-3" role="tab" id="headingOne">
                                <h2>Account Settings</h2>
                            </div>


                            <!-- Basic Info -->
                            <div class="setting-group mb-4">
                                <div class="setting-group__header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Basic</h5>
                                    <button type="button" class="btn btn-sm btn-link text-primary p-0 text-decoration-none"
                                        data-bs-toggle="modal" data-bs-target="#basicInfoModal">
                                        Edit
                                    </button>
                                </div>

                                <!-- Custom modal width -->
                                <style>
                                    .modal-dialog.modal-sm-custom {
                                        max-width: 420px;
                                    }

                                    /* Reduced height for the modal */
                                    .modal-dialog.modal-sm-custom {
                                        max-height: 220px;
                                    }

                                    /* Styling for the input fields */
                                    .form-control {
                                        height: 35px;
                                        /* Reduce the height of input fields */
                                        font-size: 14px;
                                        /* Make the text smaller */
                                        background-color: #f2f2f2;
                                        /* Dull background color */
                                    }

                                    /* Focus effect for input fields */
                                    .form-control:focus {
                                        background-color: #e9ecef;
                                        /* Slightly lighter background when focused */
                                        border-color: #007bff;
                                        /* Blue border color when focused */
                                    }
                                </style>

                                <!-- Modal -->
                                <div class="modal fade" id="basicInfoModal" tabindex="-1"
                                    aria-labelledby="basicInfoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm-custom">
                                        <div class="modal-content rounded-4 shadow">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-bold" id="basicInfoModalLabel">Basic Info</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your first name">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your last name">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your email">
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 d-flex justify-content-start">
                                                <button type="button" class="btn btn-primary rounded-2">Save</button>
                                                <button type="button" class="btn btn-secondary rounded-2"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="setting-group__content mt-2">
                                    <span class="setting-group__content--label">Name:</span>
                                    <span class="setting-group__content--desc">{{ $user->name }}
                                        {{ $user->last_name }}</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Email:</span>
                                    <span class="setting-group__content--desc">{{ $user->email }}</span>
                                    <button type="button" class="btn p-0 ms-2 text-primary" data-toggle="tooltip"
                                        data-placement="left"
                                        title="You do not need to add your email address to your profile. Casting Directors can contact you directly through the messaging system.">
                                        <i class="fa fa-info-circle"></i>
                                    </button>
                                </div>
                            </div>




                            <!-- My Details -->
                            <div class="setting-group mb-4">
                                <div class="setting-group__header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">My Details</h5>

                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-sm btn-link text-primary p-0 text-decoration-none"
                                        data-bs-toggle="modal" data-bs-target="#accountBasicDetailsInfo">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="accountBasicDetailsInfo" tabindex="-1"
                                        aria-labelledby="accountBasicDetailsInfoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm-custom">
                                            <div class="modal-content rounded-4 shadow">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="accountBasicDetailsInfoLabel">My Details
                                                    </h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form>
                                                    <div class="modal-body">
                                                        <div class="form-group mb-3">
                                                            <label for="user-organization">Organization <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="user-organization" class="form-select">
                                                                <option value="" disabled selected>Select Organization
                                                                </option>
                                                                <option value="Brand / Company">Brand / Company</option>
                                                                <option value="Creative / Marketing Agency">Creative /
                                                                    Marketing Agency</option>
                                                                <option value="Production Company">Production Company
                                                                </option>
                                                                <option value="Theater">Theater</option>
                                                                <option value="Studio / Network">Studio / Network</option>
                                                                <option value="Casting Office">Casting Office</option>
                                                                <option value="My School">My School</option>
                                                                <option value="Personal Project">Personal Project</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="jobTitle">Job Title/Role <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control" id="jobTitle" name="jobTitle"
                                                                required>
                                                                <option value="" disabled selected>Select a job title
                                                                </option>
                                                                <option value="Founder / Co-Founder">Founder / Co-Founder
                                                                </option>
                                                                <option value="CEO / Director">CEO / Director</option>
                                                                <option value="Creative Director">Creative Director
                                                                </option>
                                                                <option value="Casting Director">Casting Director</option>
                                                                <option value="Production Manager">Production Manager
                                                                </option>
                                                                <option value="Talent Manager">Talent Manager</option>
                                                                <option value="Content Creator">Content Creator</option>
                                                                <option value="Social Media Manager">Social Media Manager
                                                                </option>
                                                                <option value="Marketing Manager">Marketing Manager
                                                                </option>
                                                                <option value="Digital Marketing Executive">Digital
                                                                    Marketing Executive</option>
                                                                <option value="Brand Manager">Brand Manager</option>
                                                                <option value="Scriptwriter / Copywriter">Scriptwriter /
                                                                    Copywriter</option>
                                                                <option value="Video Editor">Video Editor</option>
                                                                <option value="Cinematographer">Cinematographer</option>
                                                                <option value="Photographer">Photographer</option>
                                                                <option value="Graphic Designer">Graphic Designer</option>
                                                                <option value="UI/UX Designer">UI/UX Designer</option>
                                                                <option value="Web Developer">Web Developer</option>
                                                                <option value="Software Engineer">Software Engineer
                                                                </option>
                                                                <option value="Recruiter / HR Manager">Recruiter / HR
                                                                    Manager</option>
                                                                <option value="Project Manager">Project Manager</option>
                                                                <option value="Business Analyst">Business Analyst</option>
                                                                <option value="Sales Executive">Sales Executive</option>
                                                                <option value="Customer Support">Customer Support</option>
                                                                <option value="Freelancer">Freelancer</option>
                                                                <option value="Student">Student</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>


                                                        <div class="form-group mb-3">
                                                            <label for="accountSettingsCompanyName">Company Name</label>
                                                            <input type="text" class="form-control"
                                                                id="accountSettingsCompanyName"
                                                                name="accountSettingsCompanyName" value="">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="accountSettingsCompanyWebsite">Company, Production,
                                                                or Personal Website</label>
                                                            <input type="url" class="form-control"
                                                                id="accountSettingsCompanyWebsite"
                                                                name="accountSettingsCompanyWebsite"
                                                                placeholder="https://example.com">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="accountSettingsprofessionalLink">Professional
                                                                Link</label>
                                                            <input type="url" class="form-control"
                                                                id="accountSettingsprofessionalLink"
                                                                name="accountSettingsprofessionalLink">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="phoneNumberField">Phone Number</label>
                                                            <div class="input-group">
                                                                <select name="phone_country_code" class="form-select"
                                                                    style="max-width: 110px;">
                                                                    <option value="+91">IND (+91)</option>
                                                                </select>
                                                                <input type="tel" class="form-control"
                                                                    name="phone_number" inputmode="numeric"
                                                                    placeholder="Enter phone number">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="setting-group__content mt-2">
                                    <span class="setting-group__content--label">Organization:</span>
                                    <span class="setting-group__content--desc"></span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Job Title/Role:</span>
                                    <span class="setting-group__content--desc"></span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Company Name:</span>
                                    <span class="setting-group__content--desc"></span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Company Website:</span>
                                    <span class="setting-group__content--desc">-</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Professional Link:</span>
                                    <span class="setting-group__content--desc">-</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Phone Number:</span>
                                    <span class="setting-group__content--desc">-</span>
                                    <div class="alert alert-info mt-2 small">
                                        Your phone number is used for account verification purposes. It will only be visible
                                        to job posters if you apply to their projects, and no one else.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
