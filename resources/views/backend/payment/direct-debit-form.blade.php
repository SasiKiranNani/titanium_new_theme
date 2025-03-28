<html>

<head>
    <title>Direct Debit Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black;
            background-color: #f5f5f5;
            /* Light gray background for the page */
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            width: 100%;
            max-width: 800px;
            /* Adjust this to your preferred width */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Optional: adds a subtle shadow */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
        }

        .header h1 {
            font-size: 50px;
            font-weight: bold;
        }

        .table h1 {
            margin: 0px;
            font-size: 23px
        }

        .table h3 {
            margin-top: 0px;
            margin-bottom: 10px;
            font-size: 17px;
        }

        .header p,
        .footer p {
            margin: 5px 0;
        }

        .section-title {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 0px;
            text-align: center;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table th {
            border: 1px solid black;
            padding: 8px;
        }

        .table th {
            text-align: left;
        }

        .table td p {
            margin: 5px;
        }

        .input {
            width: 100%;
            padding: 5px;
            border: 1px solid black;
        }

        .text-sm {
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .mb-2 {
            margin-bottom: 8px;
        }

        .mt-2 {
            margin-top: 8px;
        }

        .list-disc {
            list-style-type: disc;
            padding-left: 20px;
        }

        .label {
            font-weight: bold;
            font-style: italic;
            font-weight: 400;
            font-size: 11px;
        }

        .input-group input[type="text"],
        .input-box {
            border: 1px solid black;
            border-radius: 4px;
            width: 20px;
            height: 20px;
            text-align: center;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            margin-right: 16px;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 4px;
        }

        .note {
            color: #4a5568;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .input-box:last-child {
            margin-right: 0;
        }

        .underline {
            border-bottom: 1px dotted #000;
            display: inline-block;
            width: 200px;
        }

        .table {
            width: 100%;
        }

        .table td {
            padding: 5px;
        }

        .table .input-box {
            width: 20px;
            height: 20px;
            text-align: center;
            border: 1px solid black;
            margin: 0px;
        }

        .table .input-box:last-child {
            margin-right: 0;
        }

        .table p {
            font-size: 12px;
        }

        .from_db {
            font-size: 12px;
        }
        input {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="table"
            style="border-bottom: 1px solid black; margin-bottom: 0px; width: 100%; border-collapse: collapse; font-size: 10px;">
            <tr>
                <td style="text-align: left; border: none; padding: 3px;">
                    <h1 style="margin: 0; font-size: 20px;">MAHAJAN GROUP PTY LTD</h1>
                </td>
            </tr>
            <tr>
                <td style="width: 70%;"></td>
                <td style="text-align: left; border: none; padding: 3px;">
                    <p style="margin: 0;">Phone 0433200025</p>
                    <p style="margin: 0;">info@mahajangroup.au</p>
                    <p style="margin: 0;">9 Gulliver Dr, Officer 3809</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left; border: none; padding: 3px;">
                    <h3 style="margin: 0; font-size: 14px;">DIRECT DEBIT REQUEST</h3>
                </td>
                <td></td>
            </tr>
        </table>
        <table class="table" style="margin-bottom: 0px;">
            <tr>
                <td style="font-size: 13px; width: 15%;">Customer Name:</td>
                <td class="from_db" style="width: 25%;"><input type="text" name="customer_name"
                        style="border: none; width: 100%; border-bottom: 1px solid black; outline: none; height: 20px;">
                </td>
                <td style="font-size: 13px; width: 10%;">D.O.B.:</td>
                <td class="from_db" style="width: 20%;"><input type="date" name="dob"
                        style="border: none; width: 100%; border-bottom: 1px solid black; outline: none; height: 20px;">
                </td>
                <td style="font-size: 13px; width: 15%;">DDR Reference #</td>
                <td class="from_db" style="width: 15%;"><input type="text" name="dob"
                        style="border: none; width: 100%; border-bottom: 1px solid black; outline: none; height: 20px;">
                </td>
            </tr>
            <tr>
                <td colspan="1" style="font-size: 13px; width: 16%;">Customer Address:</td>
                <td colspan="5" class="from_db">
                    <textarea name="address" id="address"
                        style="width: 100%;border: none; width: 100%; border-bottom: 1px solid black; outline: none;"></textarea>
                </td>
            </tr>
            <tr>
                <td style="font-size: 13px;">Email:</td>
                <td class="from_db"><input type="text" class="input"
                        style="height: 20px; border: none; width: 100%; border-bottom: 1px solid black; outline: none;">
                </td>
                <td style="font-size: 13px;">Phone:</td>
                <td class="from_db"><input type="text" class="input"
                        style="height: 20px; border: none; width: 100%; border-bottom: 1px solid black; outline: none;">
                </td>
            </tr>
        </table>
        <p class="mb-4" style="border-bottom: 1px solid black; padding-bottom: 10px; margin: 0px; font-size: 9px;">*
            If debit
            exceeds $1,000 per month the customer's full name, DOB, address & phone MUST
            be supplied along with a valid photo ID (Passport or drivers licence)</p>
        <p class="mb-4" style="padding-top: 10px; margin: 0px; font-size: 11px;">I/We request Pay Advantage® ABN 38
            749
            739 150 (User Ids
            378881, 616715, 513885, and 513886) to
            debit funds from the nominated account according to the schedule below.</p>

        <table style="margin-top: 10px; width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="text-align: left; width: 13%; font-size: 10px; padding: 5px; font-weight: normal;"></th>
                    <th style="text-align: left; width: 30%; font-size: 10px; padding-left: 5px; font-weight: normal;">
                        <p style="padding: 0px; margin: 0px; font-weight: normal;">Amount</p>
                    </th>
                    <th style="text-align: left; width: 20%; font-size: 10px; font-weight: normal;">
                        <p style="padding: 0px; margin: 0px; font-weight: normal;">Date</p>
                    </th>
                    <th style="font-weight: normal;"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="label" style="width: 13%; padding: 5px;">Upfront Debit</td>
                    <td class="input-group" style="width: 30%; padding: 5px;">
                        <span>$</span>
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <span>.</span>
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                    </td>

                    <td class="input-group" style="padding: 0; width: 21%;">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <span>/</span>
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <span>/</span>
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                        <input type="text" maxlength="1" style="text-align: center; margin: 0;"
                            oninput="moveToNext(this)">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top: 5px;">
            <thead>
                <tr>
                    <th style="text-align: left; width: 13%;"></th>
                    <th style="text-align: left; font-size: 10px; width: 30%; font-weight: normal;">
                        Amount</th>
                    <th
                        style="text-align: left; font-size: 10px; width: 40%; font-weight: normal; padding-left: 14px;">
                        Frequency</th>
                    <th style="width: 17%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="label" style="width: 45px;">Recurring <br>Debits</td>
                    <td class="input-group" style="width: 180px;">
                        <!-- Nested table for Amount and Start Date -->
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="padding: 0;">
                                    <span>$</span>
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <span>.</span>
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0; font-size: 12px; padding-top: 4px;">
                                    Start Date
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0; padding-top: 2px;">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <span>/</span>
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <span>/</span>
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                    <input type="text" maxlength="1" style="margin: 0px;"
                                        oninput="moveToNext(this)">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="vertical-align: top; width: 40%; padding-left: 10px;">
                        <table style="width: 100%;">
                            <tr>
                                <td><input type="checkbox" style="margin: 0px;"></td>
                                <td class="checks" style="font-size: 10px;">Weekly</td>
                                <td><input type="checkbox" style="margin: 0px;"></td>
                                <td class="checks" style="font-size: 10px;">Fortnightly</td>
                                <td><input type="checkbox" style="margin: 0px;"></td>
                                <td class="checks" style="font-size: 10px;">Monthly</td>
                                <td><input type="checkbox" style="margin: 0px;"></td>
                                <td class="checks" style="font-size: 10px;">Quarterly</td>
                                <td><input type="checkbox" style="margin: 0px;"></td>
                                <td class="checks" style="font-size: 10px;">Yearly</td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table class="table center" style="margin-bottom: 0px;">
            <tr>
                <td style="width: 11%;"></td>
                <td style="width: 70%; font-size: 11px; text-align: left; padding-left: 10px;">The debit will continue
                    on a recurring
                    basis unless an amount reached is specified below:</td>
                <td style="width: 9%;"></td>
            </tr>
            <tr>
                <td style="width: 11%;"></td>
                <td style="text-align: left; width: 70%; padding-left: 10px;">
                    <span style="font-size: 10px;"> Amount Reached $</span>
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this)">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this)">
                    <span style="font-size: 12px;"> ,</span>
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this)">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this)">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this)">
                    <span style="font-size: 12px;"> .</span>
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this)">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this)">
                    <span style="font-size: 10px;"> (excludes any on-charged fees)</span>
                </td>
                <td style="width: 9%;"></td>
            </tr>
        </table>

        <table class="table" style="margin-bottom: 0px;">
            <tr>
                <td style="width: 13%; font-size: 10px;">Fees <span style="font-size: 9px;">(if
                        on-charged)</span></td>
                <td style="font-size: 10px;">Setup $ </td>
                <td style="font-size: 10px;">Per debit $ </td>
                <td style="font-size: 10px;">Per Dishonour $ </td>
                <td style="font-size: 10px;">Per Reminder $ </td>
            </tr>
        </table>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 10%; text-align: left;"> </th>
                    <th style="width: 30%; text-align: left; font-weight:normal; font-size: 10px; padding-left: 15px;">
                        <span>BSB</span>
                    </th>
                    <th style="width: 30%; text-align: left; font-weight:normal; font-size: 10px;">
                        <span>Account</span>
                    </th>
                    <th style="width: 30%; text-align: left; font-weight:normal; font-size: 10px;"> <span>Account
                            Name</span> </th>
                </tr>
            </thead>
            <tr>
                <td style="width: 10%; font-size: 11px;">Account</td>
                <td style="width: 30%; padding-left: 15px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                </td>
                <td style="width: 30%;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                    <input type="text" maxlength="1" class="input-box" maxlength="1"
                        oninput="moveToNext(this)" style="margin: 0px;">
                </td>
                <td style="width: 30%;">
                    <input type="text" name="account_name"
                        style="border: none; width: 100%; border-bottom: 1px dotted black; outline: none; height: 20px;">
                </td>
            </tr>
        </table>
        <p class="left" style="font-size: 10px;">* If debiting from a joint bank account, both
            signatures are required.</p>
        <table class="table center">
            <tr>
                <td style="vertical-align: top; width: 25%; padding-right: 15px;">
                    <input type="text" name="account_name"
                        style="border: none; border-bottom: 1px dotted black; outline: none; width: 100%;">
                </td>
                <td style="vertical-align: top; width: 25%; padding-right: 15px; text-align: left;">
                    <input type="date" name="account_name"
                        style="border: none; border-bottom: 1px dotted black; outline: none; width: 100px;">
                    <p class="left" style="margin: 0; font-size: 12px;">Date</p>
                </td>
                <td style="vertical-align: top; width: 25%; padding-right: 15px;">
                    <input type="text" name="account_name"
                        style="border: none; border-bottom: 1px dotted black; outline: none; width: 100%;">
                </td>
                <td style="vertical-align: top; width: 25%; padding-right: 15px; text-align: left;">
                    <input type="date" name="account_name"
                        style="border: none; border-bottom: 1px dotted black; outline: none; width: 100px;">
                    <p class="left" style="margin: 0; font-size: 12px;">Date</p>
                </td>
            </tr>
        </table>

        <h3 class="section-title">Direct Debit Terms & Conditions</h3>
        <table class="table">
            <tr>
                <td>
                    <h4 class="text-bold" style="font-size: 9px; margin: 0px;">Direct Debit service agreement</h4>
                    <p style="font-size: 9px;">The Upfront (if specified) and Recurring Debits will be debited from
                        the nominated account
                        according to the schedule specified above. Recurring Debits continue until the Direct Debit has
                        been cancelled or the Amount Reached has been specified and met. Any on-charged fees are
                        excluded when determining if the Amount Reached has been met.</p>
                    <p style="font-size: 9px;">If a scheduled debit date has passed before the Direct Debit has been
                        activated (authorised and
                        approved) then these debits will occur on the next possible processing day after activation.</p>
                    <p style="font-size: 9px; margin: 0px; padding: 0px;">It is your responsibility to ensure that:
                    </p>
                    <ul style="list-style-type: none; padding-left: 20px; margin: 0px;">
                        <li style="font-size: 9px;">- your nominated account can accept direct debits (your financial
                            institution can confirm
                            this); and</li>
                        <li style="font-size: 9px;">- that on the scheduled debit date there is sufficient cleared
                            funds in the nominated account;
                            and</li>
                        <li style="font-size: 9px;">- you advise us if the nominated account is transferred or closed.
                        </li>
                    </ul>
                    <p style="font-size: 9px;">If your debit is returned or dishonoured by your financial institution,
                        the dishonoured debit
                        will be re-debited from your nominated account in addition to any applicable fee(s) as listed
                        above. Any drawing on a non-business day will be debited to your account on the next business
                        day following the scheduled drawing date. Dishonoured debits may be re-debited together with
                        other scheduled debit(s). Should you cancel the Direct Debit, instruct your bank not to make
                        payment, or more than two (2) consecutive debits are dishonoured we may cancel this agreement
                        and the remaining scheduled amount plus all penalty charges will be due and payable.</p>
                </td>
                <td>
                    <h4 class="text-bold" style="font-size: 9px; margin: 0px;">Changes to the service agreement</h4>
                    <p style="font-size: 9px;">Changes to the drawing service agreement can be made by clearly
                        outlining the requested change(s)
                        in writing and sending them to the Provider. Changes may include deferring a debit, altering
                        debit amounts, stopping a debit, suspending the Direct Debit, or cancelling the Direct Debit
                        completely. The notice period for any such proposed amendments shall be no less than thirty (30)
                        days in advance of the intended effective date of the changes. If a cancellation is requested
                        due to the merchant's variations to terms of the debit agreement, no penalty should be imposed.
                    </p>
                    <h4 class="text-bold" style="font-size: 9px;">Enquiries</h4>
                    <p style="font-size: 9px;">All enquiries should be made to the Provider in the first instance, and
                        then to Pay Advantage®.
                        All communication should include your full name and/or company name, the BSB/Account number
                        being debited, and return contact details. All personal customer information held by us will be
                        kept confidential except information provided to your financial institution to initiate the
                        drawing to your nominated account.</p>
                    <h4 class="text-bold" style="font-size: 9px;">Disputes</h4>
                    <p style="font-size: 9px;">If you believe a debit has been initiated incorrectly, we encourage you
                        to take the matter up
                        directly with the Provider in the first instance. If the dispute remains unresolved, then you
                        can lodge your concern in writing with Pay Advantage®. You will receive a refund of the debited
                        amount(s) if the reason for the debit(s) is not substantiated.</p>
                </td>
            </tr>
        </table>
        <div class="footer">
            <p class="text-sm" style="font-size: 9px; width: 100%;">Direct debit services provided by <img
                    src="{{ asset('backend/img/payadvantage.png') }}" alt="" style="width: 20px;">
                <strong>Pay<span style="color: red;">Advantage</span></strong> <b style="color: red;">|</b> <span
                    style="color: red;"> P </span> <b style="color: red;">1300 641
                    310</b> <b style="color: red;">|</b>
                <b style="color: red;">info@payadvantage.com.au</b> <b style="color: red;">|</b> <b
                    style="color: red;">www.payadvantage.com.au</b>
            </p>
        </div>
    </div>


    <script>
        function moveToNext(input) {
            if (input.value.length >= input.maxLength) {
                let nextInput = input.nextElementSibling;
                while (nextInput && nextInput.tagName !== "INPUT") {
                    nextInput = nextInput.nextElementSibling;
                }
                if (nextInput) {
                    nextInput.focus();
                }
            }
        }

        function moveToPrevious(input) {
            if (input.value.length === 0) {
                let previousInput = input.previousElementSibling;
                while (previousInput && previousInput.tagName !== "INPUT") {
                    previousInput = previousInput.previousElementSibling;
                }
                if (previousInput) {
                    previousInput.focus();
                }
            }
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Backspace') {
                moveToPrevious(document.activeElement);
            }
        });
    </script>
</body>

</html>
