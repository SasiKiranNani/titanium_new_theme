
{{-- this agreement was sharing to mail after user submitted the agreement --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if ($company_name == 'Mahajan Group')
            <h1>MAHAJAN GROUP</h1>
@elseif ($company_name == 'EMM Kay Group')
            <h1>EMM KAY GROUP PTY LTD</h1>
        @else
            <h1>Vaa Transport Pty Ltd</h1>
        @endif
    </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: #f9fafb; */
            background-color: white;
            /* Set white background color */
            font-size: 0.9rem;
            /* Reduced font size for the body */
        }

        .container {
            background-color: white;
            padding: 20px;
            margin: 0px auto;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .size {
            text-align: center;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            font-size: 1.8rem;
            /* Reduced font size */
            color: black;
            margin: 10px 0;
            /* Reduced margin */
        }

        h2 {
            text-align: center;
            font-weight: bold;
            font-size: 1.3rem;
            /* Reduced font size */
            color: black;
            margin: 5px 0;
            /* Reduced margin */
        }

        .body-header {
            border-bottom: 2px solid black;
            margin-bottom: 20px;
            /* Reduced margin */
        }

        p {
            margin-top: 10px;
            /* Reduced margin */
            color: #4a5568;
        }

        h3 {
            font-size: 1.1rem;
            /* Reduced font size */
            font-weight: bold;
            margin-bottom: 15px;
            /* Reduced margin */
            color: #4a5568;
            margin-top: 15px;
            /* Reduced margin */
            border-bottom: 2px solid black;
            padding-bottom: 5px;
            /* Reduced padding */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            /* Reduced margin */
            table-layout: fixed;
        }

        td {
            border: 1px solid #cbd5e0;
            padding: 8px;
            /* Reduced padding */
            color: #4a5568;
            text-align: left;
            font-size: 0.9rem;
            /* Reduced font size for table */
        }

        .empty-cell {
            padding: 10px;
            /* Reduced padding for empty cells */
        }

        .signature-container {
            text-align: center;
            /* Center the signature */
            margin-top: 10px;
            /* Add some space above the signature */
        }

        .signature-image {
            width: 200px;
            /* Set a fixed width for the signature */
            height: auto;
            /* Maintain aspect ratio */
            border: 1px solid #cbd5e0;
            /* Optional: Add a border around the signature */
            border-radius: 4px;
            /* Optional: Add rounded corners */
            margin-top: 5px;
            /* Add some space above the signature image */
        }

        /* agreement data started */
        .content {
            columns: 3;
            column-gap: 20px;
        }

        .content p {
            margin: 0 0 5px 0;
            font-size: 10px;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
        }

        h5 {
            text-align: center;
            color: #3c3cb1;
            margin: 0px 0px 20px;
        }

        p {
            display: flex;
            align-items: flex-start;
        }

        .content-text {
            margin-left: 10px;
            flex: 1;
        }

        .subpoints {
            margin-left: 20px !important;
        }

        .subpoints-2 {
            margin-left: 40px !important;
        }
    </style>
</head>

<body>
    {{-- emails.agreement.blade.php --}}
    <div class="container">
        <div class="body-header">
            @if ($company_name == 'Mahajan Group')
                <h1>MAHAJAN GROUP</h1>
 @elseif ($company_name == 'EMM Kay Group')
                <h1>EMM KAY GROUP PTY LTD</h1>
            @else
                <h1>Vaa Transport Pty Ltd</h1>
            @endif
            <h2>MOTOR VEHICLE (RIDE SHARE) RENTAL AGREEMENT</h2>
            <p class="size">This Agreement contains all of the terms that apply to your rental of a Vehicle from Us.
                Therefore, we ask you that read this
                Agreement carefully and let us know if you have any questions or concerns. Once you sign this Agreement,
                you agree to be bound
                by each of the terms contained in this Agreement, whether or not you have read its contents</p>
        </div>
        <table>
            <tbody>
                <tr>
                    <td rowspan="7"><b>Hirer</b></td>
                    <td><b>Name / Entity</b></td>
                    <td class="empty-cell">{{ $name }}</td>
                </tr>
                <tr>
                    <td><b>ABN / ACN</b></td>
                    <td class="empty-cell">{{ $abn }}</td>
                </tr>
                <tr>
                    <td><b>Address</b></td>
                    <td class="empty-cell">{{ $address }}</td>
                </tr>
                <tr>
                    <td><b>Drivers' License No</b></td>
                    <td class="empty-cell">{{ $licence_no }}</td>
                </tr>
                <tr>
                    <td><b>DOB</b></td>
                    <td class="empty-cell">{{ $dob }}</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td class="empty-cell" style="word-wrap: break-word; word-break: break-word;">{{ $email }}</td>
                </tr>
                <tr>
                    <td><b>Contact Number</b></td>
                    <td class="empty-cell">{{ $contact }}</td>
                </tr>

                <tr>
                    <td rowspan="4"><b>Authorised Driver(s) (if applicable)</b></td>
                    <td><b>Name</b></td>
                    <td class="empty-cell">{{ $authorised_driver_name }}</td>
                </tr>
                <tr>
                    <td><b>DOB</b></td>
                    <td class="empty-cell">{{ $authorised_driver_dob }}</td>
                </tr>
                <tr>
                    <td><b>Address</b></td>
                    <td class="empty-cell">{{ $authorised_driver_address }}</td>
                </tr>
                <tr>
                    <td><b>Drivers' License No</b></td>
                    <td class="empty-cell">{{ $authorised_driver_license_no }}</td>
                </tr>

                <tr>
                    <td rowspan="4"><b>Vehicle</b></td>
                    <td><b>Make / Model / Year</b></td>
                    <td class="empty-cell">{{ $make }} / {{ $model }} / {{ $purchase_date }}</td>
                </tr>
                <tr>
                    <td><b>Odometer</b></td>
                    <td class="empty-cell">{{ $odometer }}</td>
                </tr>
                <tr>
                    <td><b>Rego</b></td>
                    <td class="empty-cell">{{ $reg_no }}</td>
                </tr>
                <tr>
                    <td><b>VIN</b></td>
                    <td class="empty-cell">{{ $vin }}</td>
                </tr>

                <tr>
                    <td rowspan="2"><b>Agreed Hire Period</b></td>
                    <td><b>Start Date</b></td>
                    <td class="empty-cell">{{ $rent_start_date }}</td>
                </tr>
                <tr>
                    <td><b>End Date</b></td>
                    <td class="empty-cell">{{ $rent_end_date }}</td>
                </tr>
                <tr>
                    <td><b>Insurance</b></td>
                    <td colspan="2">
                        To be provided by Us, as per the <b>enclosed</b> PDS<br>
                        <span class="text-xs mt-4">
                            Please note that <span class="underline">under no circumstances will any Insurance cover
                                any driver under the
                                age of 21 years old, or any driver that has held a Driver's License issued by an
                                Australian State or Territory for less than 2 years.</span>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mb-8">
            <h3>ANNEXURE A – HIRE CHARGES</h3>
            <table>
                <tr>
                    <td><b>Base Hire Charge</b> <br>
                        (to be applied and debited weekly in advance, commencing on the
                        date this Agreement is signed)
                    </td>
                    <td>{{ $cost_per_week }}</td>
                </tr>
                <tr>
                    <td><b>Deposit</b></td>
                    <td>{{ $deposit_amount }}</td>
                </tr>
                <tr>
                    <td><b>Insurance Excesses</b></td>
                    <td>In the case of a claim under any Insurance, $1500 per claim,
                        plus:<br>
                        (a) a further $500 if the circumstances relating to the claim
                        involve a driver under 25;<br>
                        (b) a further $500 if the circumstances relating to the claim
                        involve an unauthorised driver.
                    </td>
                </tr>
                <tr>
                    <td><b>Failed Debit or Delayed Payment Charges</b>
                        <br> (to be applied to any failed or delayed
                        payment, in addition to any Damages)
                    </td>
                    <td>$20 per failed debit or delayed payment, in
                        addition to any
                        other or further amounts that may be charged pursuant to the Agreement.</td>
                </tr>
                <tr>
                    <td><b>Toll Charges</b></td>
                    <td>As per all usage during the Hire Period,
                        <b>plus</b> $20
                        for each
                        occasion on which you fail to display an e-tag or other toll pass, as required by the toll
                        operator in question.
                    </td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td class="signature-container" style="display: flex; text-align: center; justify-content: center">
                        <img src="{{ $signature }}" alt="Signature" class="signature-image">
                        <p>signature</p>
                        <p><strong>IP Address :</strong> {{ $ip_address }}</p>
                        <p><strong>Date and Time :</strong> {{ $submission_date_time }}</p>
                    </td>
                </tr>
            </table>
        </div>

        @if ($company_name == 'Mahajan Group')
            <h5 style="margin-top: 20px;">Mahajan Group Pty Ltd - ABN: 62 626 607 145 - Hire Terms and Conditions of
                Trade</h5>
@elseif ($company_name == 'EMM Kay Group')
            <h5 style="margin-top: 20px;">EMM KAY GROUP PTY LTD - ABN: 52 652 574 528 - Hire Terms and Conditions of
                Trade</h5>
        @else
            <h5 style="margin-top: 20px;">Vaa Transport Pty Ltd - Hire Terms and Conditions of Trade</h5>
        @endif
        <div class="content">
            <p><b>1. Definitions</b></p>
            <p>
                1.1
                <span class="content-text"><b>
                        @if ($company_name == 'Mahajan Group')
                            “MG”
             @elseif ($company_name == 'EMM Kay Group')
                            “EMM KAY”
                        @else
                            “Vaa Transport”
                        @endif
                    </b> means
                    @if ($company_name == 'Mahajan Group')
                        Mahajan Group Pty Ltd, ABN 62 626 607 145
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY Group Pty Ltd, ABN 52 652 574 528
                    @else
                        Vaa Transport Pty Ltd
                    @endif
                    , its
                    successors
                    and
                    assigns or any person acting on behalf of and with the authority of @if ($company_name == 'Mahajan Group')
                        Mahajan
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    Group Pty Ltd.
                </span>
            </p>
            <p>1.2<span class="content-text"><b>“Agreement”</b> means the terms and conditions contained herein,
                    together with
                    any quotation, Hire form, invoice or other document or amendments expressed to
                    be supplemental to this Agreement. </span></p>
            <p>1.3<span class="content-text"><b>“Hirer”</b> means the person/s, entities or any person acting on
                    behalf
                    of and with
                    the authority of the Hirer requesting the Owner to provide the services as
                    specified in any proposal, quotation, order, invoice or other documentation, and:</span></p>
            <p class="subpoints">(a)<span class="content-text">if there is more than one Hirer, is a reference to
                    each
                    Hirer jointly and
                    severally; and</span></p>
            <p class="subpoints">(b)<span class="content-text">if the Hirer is a partnership, it shall bind each
                    partner
                    jointly and severally;
                    and</span></p>
            <p class="subpoints">(c)<span class="content-text">if the Hirer is a part of a Trust, shall be bound
                    in
                    their capacity as a trustee;
                    and</span></p>
            <p class="subpoints">(d)<span class="content-text">includes the Hirer’s executors, administrators,
                    successors and permitted
                    assigns.</span></p>
            <p>1.4.1<span class="content-text"><b>“Equipment”</b> means all Equipment or Services (including any
                    parts,
                    accessories and/or consumables) supplied on hire by @if ($company_name == 'Mahajan Group')
                        Mahajan
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif Group Pty Ltd
                    to the Hirer (and where the context so permits shall include any incidental
                    supply of services). The Equipment shall be as described on the invoices,
                    quotation, authority to hire, or any other work authorisation forms as provided
                    by @if ($company_name == 'Mahajan Group')
                        Mahajan
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif Group Pty Ltd to the Hirer</span></p>
            <p>1.5<span class="content-text"><b>“Minimum Hire Period”</b> means the Minimum Hire Period as
                    described on
                    the
                    invoices, quotation, authority to hire, or any other forms as provided by @if ($company_name == 'Mahajan Group')
                        Mahajan
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    Group Pty Ltd to the Hirer</span></p>
            <p>1.6<span class="content-text"><b>"Services”</b> mean all Services supplied by @if ($company_name == 'Mahajan Group')
                        Mahajan
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif Group Pty Ltd
                    to
                    the Hirer
                    at the Hirer’s request from time to time.
                </span></p>
            <p>1.7<span class="content-text"><b>“Hire Day”</b> means all days of the week including a Saturday,
                    Sunday
                    or public
                    holiday.</span></p>
            <p>1.8<span class="content-text"><b>"Confidential Information”</b> means information of a confidential
                    nature whether
                    oral, written or in electronic form including, but not limited to, this Contract,
                    either party’s intellectual property, operational information, know-how, trade
                    secrets, financial and commercial affairs, contracts, Hirer information (including
                    but not limited to, <b>“Personal Information”</b> such as: name, address, D.O.B,
                    occupation, driver’s license details, electronic contact (email, Facebook or
                    Twitter details), medical insurance details or next of kin and other contact
                    information (where applicable), previous credit applications, credit history) and
                    pricing details.
                </span></p>
            <p>1.9<span class="content-text"><b>“Price”</b> means the Price payable (plus any GST where applicable)
                    for
                    the
                    Equipment/Services as agreed between
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif Pty Ltd and the Hirer in accordance
                    with clause 5 below.
                </span></p>
            <p>1.10<span class="content-text"><b>“Cookies”</b> means small files which are stored on a user’s
                    computer.
                    They are
                    designed to hold a modest amount of data (including Personal Information)
                    specific to a particular Hirer and website and can be accessed either by the web
                    server or the Hirer’s computer. <b> If the Hirer does not wish to allow Cookies to
                        operate in the background when using
                        @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif’s website, then the Hirer shall
                        have the right to enable / disable the Cookies first by selecting the option to
                        enable / disable provided on the website, prior to making enquiries via the
                        website.
                    </b> </span></p>
            <p>1.11<span class="content-text"><b>“GST”</b> means Goods and Services Tax (GST) as defined within the
                    “A
                    New Tax
                    System (Goods and Services Tax) Act 1999”</span></p>


            <p><b>2. Acceptance</b></p>


            <p>2.1<span class="content-text">The Hirer is taken to have exclusively accepted and is immediately
                    bound,
                    jointly
                    and severally, by these terms and conditions if the Hirer places an order for or
                    accepts delivery of the Services.</span></p>
            <p>2.2<span class="content-text">These terms and conditions may only be amended with the consent of
                    both
                    parties in writing, and shall prevail to the extent of any inconsistency with any
                    other document or contract between the Hirer and @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif.
                </span></p>
            <p>2.3<span class="content-text">Any advice, recommendation, information, assistance or service
                    provided by
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    in relation to Equipment/Services supplied is given in good faith, is based on
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s own knowledge and experience and shall be accepted without
                    liability on
                    the part of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif and it shall be the responsibility of the Hirer to confirm the
                    accuracy and reliability of the same in light of the use to which the Hirer makes or
                    intends to make of the Equipment or Services
                </span></p>
            <p>2.4<span class="content-text">The Hirer acknowledges that the supply of Equipment/Services on credit
                    shall not
                    take effect until the Hirer has completed a credit application with @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif and it has
                    been approved with a credit limit established for the account.</span></p>
            <p>2.5<span class="content-text">In the event that the supply of Equipment or Services request exceeds
                    the
                    Hirers
                    credit limit and/or the account exceeds the payment terms, @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif reserves the right
                    to refuse delivery</span></p>
            <p>2.6<span class="content-text">The Hirer acknowledges and accepts that the supply of Equipment or
                    Services
                    for
                    accepted orders may be subject to availability and if, for any reason,
                    Equipment/Services are not, or cease to be available, @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif reserves the right to
                    vary the Price with alternative Equipment/Services as per clause 3.2.
                </span></p>
            <p>2.7<span class="content-text">Electronic signatures shall be deemed to be accepted by either party
                    providing
                    that the parties have complied with Section 14 of the Electronic Transactions
                    (Victoria) Act 2001 or any other applicable provisions of that Act or any
                    Regulations referred to in that Act.</span></p>


            <p><b>3. Pricing</b></p>


            <p>3.1<span class="content-text">Prices quoted for the supply of Equipment/Services exclude GST and any
                    other
                    taxes or duties imposed on or in relation to the Equipment/Services. Any such
                    GST and other taxes or duties are additionally at the Hirer’s account.</span></p>
            <p>3.2<span class="content-text">At @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s sole discretion, or as otherwise agreed between the parties
                    the
                    Price
                    shall be either:</span></p>
            <p class="subpoints">(a)<span class="content-text">as indicated on any invoice provided by
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif to the
                    Hirer;
                    or
                </span></p>
            <p class="subpoints">(b)<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s quoted price (subject to clause 3.3) which
                    will be
                    valid for the period
                    stated in the quotation or otherwise for a period of thirty (30) days.
                </span></p>
            <p class="subpoints">(c)<span class="content-text">May be estimate only (subject to clause 3.3) which
                    is a
                    guide to potential
                    price for Equipment/Services.
                </span></p>
            <p>3.3<span class="content-text">If the Hirer requests any variation to the Equipment/Services,
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may
                    increase
                    the price to account for the variation.
                </span></p>
            <p>3.4<span class="content-text">Subject to clause 3.3, where there is any change in the costs incurred
                    by
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif in
                    relation to the Equipment/Services, @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may vary its price to take into account of
                    any such change, by notifying the Hirer.
                </span></p>
            <p>3.5<span class="content-text"></span>At @if ($company_name == 'Mahajan Group')
                    MG
     @elseif ($company_name == 'EMM Kay Group')
                    EMM KAY
                @else
                    Vaa Transport
                @endif’s sole discretion, a non-refundable deposit equivalent to
                one
                (1) weeks
                rent may be required. If required, @if ($company_name == 'Mahajan Group')
                    MG
     @elseif ($company_name == 'EMM Kay Group')
                    EMM KAY
                @else
                    Vaa Transport
                @endif will notify the Hirer.
            </p>

            <p><b>4. Payment</b></p>
            <p>4.1<span class="content-text">The time for payment for the Equipment/Services is of the
                    essence.</span>
            </p>
            <p>4.2<span class="content-text">The Price will be payable by the Hirer on the date/s determined by
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif,
                    which
                    may be:
                </span></p>
            <p class="subpoints">(a)<span class="content-text">
                    one (1) week in advance;
                </span>
            </p>
            <p class="subpoints">(b)<span class="content-text">
                    the date specified on any invoice or other form as being the date for
                    payment; or
                </span>
            </p>
            <p class="subpoints">(c)<span class="content-text">
                    failing any notice to the contrary, the date which is seven (7) days following
                    the date of any invoice given to the Hirer by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                </span>
            </p>
            <p>4.3<span class="content-text">Payment may be made by electronic/on-line banking, credit card, or by
                    any
                    other method as agreed to between the Hirer and @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif. </span></p>
            <p>4.4<span class="content-text">Payment made by credit card will incur a surcharge up to 2.5%. </span>
            </p>
            <p>4.5<span class="content-text">The Hirer shall not be entitled to set off against, or deduct from the
                    Price, any
                    sums owed or claimed to be owed to the Hirer by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif nor to withhold payment of
                    any invoice because part of that invoice is in dispute</span></p>
            <p>4.6<span class="content-text">Prices quoted for supply of Equipment/Services exclude GST and any
                    other
                    taxes
                    or duties imposed on or in relation to the Equipment/Services. In addition to the
                    Price the Hirer must pay to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                        @endif an amount equal to any GST @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                            @endif must pay for any supply by @if ($company_name == 'Mahajan Group')
                                MG
                 @elseif ($company_name == 'EMM Kay Group')
                                EMM KAY
                            @else
                                Vaa Transport
                            @endif under
                            this or any other Agreement. The Hirer must pay GST,
                            without deduction or set off of any other amounts, at the same time and on the
                            same basis as the Hirer pays the Price. In addition, the Hirer must pay any other
                            taxes and duties that may be applicable in addition to the Price except where they
                            are expressly included in the Price</span></p>
            <p>4.7<span class="content-text">Payment terms may be revoked or amended at @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s sole discretion, upon
                    giving
                    the Hirer prior written notice.
                </span></p>

            <p><b>5. Hire Period </b></p>


            <p>5.1<span class="content-text">Hire charges shall commence from the time the Equipment leaves
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s
                    premises and continue until the Hirer notifies @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif that the Equipment is
                    available for collection, and/or until the expiry of the Minimum Hire Period,
                    whichever last occurs.
                </span></p>
            <p>5.2<span class="content-text">The date upon which the Hirer advises of termination shall in all
                    cases be
                    treated
                    as a full day’s hire.
                </span></p>
            <p>5.3<span class="content-text">If at the end of the hire period the whole of the Equipment is not
                    returned
                    to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    then the daily hire charge rate calculated on a pro-rata basis plus twenty
                    percent (20%) shall be payable by the Hirer to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif until the whole of the
                    Equipment originally supplied is returned to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif. The parties agree that this is a
                    genuine estimate of damages which will be suffered by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif should any
                    Equipment not be returned by the Hirer when due.</span></p>
            <p>5.4<span class="content-text">No allowance whatsoever can be made for time during which the
                    Equipment is
                    not in use for any reason, unless @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif confirms special prior arrangements in
                    writing. In the event of Equipment breakdown provided the Hirer notifies @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    immediately, hiring charges will not be payable during the time the Equipment is
                    not working, unless the condition is due to negligence or misuse on the part of
                    or attributable to the Hirer. Upon notice of breakdown @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif undertakes to repair
                    or (where necessary) supply suitable replacement Equipment as soon as @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif is
                    reasonably able.</span></p>
            <p>5.5<span class="content-text">Off-hire numbers will only be issued when the Equipment has been
                    either
                    collected by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                        @endif or returned to @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif’s premises.</span></p>

            <p><b>6. Access for Delivery or Collection</b></p>


            <p>6.1<span class="content-text">The Hirer shall ensure that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif has free and clear access to the
                    worksite at
                    which the Equipment is to be, or is, located. If there are any delays due to free
                    and clear access not being available, then the Hirer shall be responsible for
                    (and shall reimburse) @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                        @endif for all additional costs incurred by @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif in gaining
                        suitable access to the worksite and/or @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif’s Equipment.
                </span></p>

            <p><b>7. Delivery of Equipment/Services
                </b></p>
            <p>7.1<span class="content-text">Delivery <b>(“Delivery”)</b> of the Goods is taken to occur at the
                    time
                    that:</span></p>
            <p class="subpoints">(a)<span class="content-text">
                    the Hirer or the Hirer’s nominated carrier takes possession of the Goods at
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s address; or
                </span>
            </p>
            <p class="subpoints">(b)<span class="content-text">
                    Delivery (“Delivery”) of the Goods and/or Services is taken to occur at the
                    time that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    (or @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s nominated carrier) delivers the Goods and/or
                    Services to the Hirer’s nominated address even if the Hirer is not present
                    at the address.
                </span>
            </p>
            <p>7.2<span class="content-text"> At @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s sole discretion the cost of delivery is either included in
                    the
                    Price or is in
                    addition to the Price.</span></p>
            <p>7.3<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may deliver the Equipment/Services in separate instalments. Each
                    separate
                    instalment shall be invoiced and paid in accordance with the provisions in these
                    terms and conditions.
                </span></p>
            <p>7.4<span class="content-text">Any time specified by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif for delivery of the Equipment/Services is an
                    estimate
                    only and @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif will not be liable for any loss or damage incurred by the Hirer as a
                    result of delivery being late. However, both parties agree that they shall make
                    every endeavour to enable the Equipment/Services to be delivered at the time
                    and place as was arranged between both parties. In the event that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif is unable
                    to supply the Equipment/Services as agreed solely due to any action or inaction
                    of the Hirer, then @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall be entitled to charge a reasonable fee for redelivery. </span>
            </p>

            <p><b>8. Risk for the Equipment </b></p>


            <p>8.1<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif retains title in the Equipment nonetheless all risk for the
                    Equipment
                    passes to
                    the Hirer on Delivery.
                </span></p>
            <p>8.2<span class="content-text">The Hirer accepts full responsibility for the safekeeping of the
                    Equipment
                    and
                    indemnifies @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif for all loss, theft, or damage to the Equipment howsoever
                    caused and without limiting the generality of the foregoing whether or not such
                    loss, theft, or damage is attributable to any negligence, failure, or omission of
                    the Hirer.</span></p>
            <p>8.3<span class="content-text"> The Hirer must prior to Delivery insure, @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s interest in the
                    Equipment
                    against
                    physical loss or damage including, but not limited to, the perils of accident, fire,
                    theft and burglary and all other usual risks and will effect adequate Public
                    Liability Insurance covering any loss, damage or injury to property arising out of
                    the Equipment. Further the Hirer will not use the Equipment nor permit it to be
                    used in such a manner as would permit an insurer to decline any claim.
                </span></p>

            <p><b>9. Title to Equipment</b></p>
            <p>9.1<span class="content-text">The Equipment is and will at all times remain the absolute property of
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                </span>
            </p>
            <p>9.2<span class="content-text">If the Hirer fails to allow for the collection of the Equipment to
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    as
                    required
                    under this agreement then @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                        @endif or @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif’s agent may (as the invitee of the Hirer)
                        enter upon and into land and premises owned, occupied or used by the Hirer,
                        or any premises where the Equipment is situated and take possession of the
                        Equipment, and for such purpose break open any gate or lock to gain access to
                        the Equipment without being guilty of any form of trespass, any without any
                        liability to repair or re-instate items belonging to the Hirer. Any costs incurred by
                        @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                            @endif as a result of @if ($company_name == 'Mahajan Group')
                                MG
                 @elseif ($company_name == 'EMM Kay Group')
                                EMM KAY
                            @else
                                Vaa Transport
                            @endif so repossessing the Equipment shall be charged to the
                            Hirer. In addition, @if ($company_name == 'Mahajan Group')
                                MG
                 @elseif ($company_name == 'EMM Kay Group')
                                EMM KAY
                            @else
                                Vaa Transport
                            @endif shall be entitled within seven (7) days of such
                            repossession to be paid by the Hirer all hire charges due, plus all other charges
                            levied in accordance with this agreement.
                </span></p>

            <p><b>10. @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s Responsibilities</b></p>

            <p>10.1<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall have the right to determine the type of operation for which
                    the
                    Equipment may be reasonably used, and the suitability of the Equipment to be
                    used. If at any time @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif believes that its Equipment is not suitable for the type of
                    operation that the Hirer is using the Equipment for then @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall have the right to
                    suspend or terminate this agreement without any liability to the Hirer whatsoever.
                </span></p>
            <p>10.2<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall supply all Equipment in a safe, useable and roadworthy
                    condition.
                </span></p>
            <p>10.3<span class="content-text">Hydraulic hose, fittings and electrical faults caused through age or
                    wear
                    and tear
                    shall be borne by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif unless the Hirer has contributed to the fault through misuse
                    of the Equipment in which event the Hirer shall pay the cost of repairing the fault. </span></p>

            <p><b>11. Hirer’s Responsibilities
                </b></p>
            <p>11.1<span class="content-text">The Hirer shall: </span></p>
            <p class="subpoints">(a)<span class="content-text">
                    ensure that the operator of any Equipment is not under the influence of
                    alcohol or any drug that may impair their ability to operate the Equipment;

                </span>
            </p>
            <p class="subpoints">(b)<span class="content-text">
                    ensure that all persons driving and/or operating Equipment are suitably
                    instructed in the Equipment’s safe and proper use and where necessary
                    that the operator holds and is fully licensed to drive and/or operate the
                    Equipment and shall provide evidence of the same to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif upon request;
                </span>
            </p>
            <p class="subpoints">(c)<span class="content-text">
                    check the equipment daily for oil, grease, water and battery levels and any
                    sign of looseness or wear and shall at the Hirer’s own cost maintain the
                    Equipment as is required by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    (including, but not limited to, maintaining
                    (where applicable) water, battery, grease, oil and other fluid levels (using
                    only products approved by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif), and tyre pressures);
                </span>
            </p>
            <p class="subpoints">(d)<span class="content-text">
                    ensure that all reasonable care is taken by the driver in handling and/or
                    parking the Equipment and that the Equipment is left locked, securely
                    stored, and protected against acts of theft or vandalism when not in use;
                </span>
            </p>
            <p class="subpoints">(e)<span class="content-text">
                    be liable for any parking or traffic infringement, impoundment, towage and
                    storage costs incurred during the hire period and will supply relevant details
                    as required by the Police and/or @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif relating to any such matters or
                    occurrences;
                </span>
            </p>
            <p class="subpoints">(f)<span class="content-text">
                    not carry any animals, illegal, prohibited or hazardous substances on, or in,
                    the Equipment supplied without the prior written permission of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif;
                </span>
            </p>
            <p class="subpoints">(g)<span class="content-text">
                    not exceed the recommended or legal load and capacity limits of the
                    Equipment (including the recommended number of passengers (if
                    applicable);
                </span>
            </p>
            <p class="subpoints">(h)<span class="content-text">
                    refuel the Equipment prior to its return from hire. In the event the Equipment
                    needs to be refueled upon its return from hire then the costs of refueling (as
                    set out in the hire agreement) shall be charged to the Hirer in addition to the
                    costs of the Equipment hire;

                </span>
            </p>
            <p class="subpoints">(i)<span class="content-text">
                    notify @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif immediately by telephone of the full circumstances of any
                    mechanical breakdown or accident. The Hirer is not absolved from the
                    requirements to safeguard the Equipment by giving such notification. The
                    Hirer shall immediately take all steps to secure the Equipment so as to
                    prevent any potential injury to person or property, and to prevent any
                    potential or additional damage to the Equipment itself;
                </span>
            </p>
            <p class="subpoints">(j)<span class="content-text">
                    satisfy itself at commencement that the Equipment is suitable for its
                    purposes;
                </span>
            </p>
            <p class="subpoints">(k)<span class="content-text">
                    operate the Equipment safely, strictly in accordance with the law, only for
                    its intended use, and in accordance with any manufacturer’s instruction
                    whether supplied by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif or posted on the Equipment
                </span>
            </p>
            <p class="subpoints">(l)<span class="content-text">
                    on termination of the hire, deliver the Equipment complete with all parts and
                    accessories, clean and in good order as delivered, fair wear and tear
                    accepted, to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    (or @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s designated address);
                </span>
            </p>
            <p class="subpoints">(m)<span class="content-text">
                    keep the Equipment in their own possession and control and shall not
                    assign the benefit of the hire agreement nor be entitled to sell, sub-let, take
                    a lien, grant any encumbrance, or create any form of security interest over
                    the Equipment, or allow the Equipment to become a fixture (or any part of,
                    a fixture). The Hirer shall immediately inform any person trying to take
                    possession of, or attempting to seize the Equipment (for any reason), of
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s interest in, and ownership of, the Equipment, and must immediately
                    notify @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif of any such event;

                </span>
            </p>
            <p class="subpoints">(n)<span class="content-text">
                    not alter or make any additions to the Equipment including but without
                    limitation altering, make any additions to, defacing or erasing any identifying
                    mark, plate or number on or in the Equipment or in any other manner
                    interfere with the Equipment. In the event that any decal on @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s equipment
                    has been removed then all costs incurred by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif in replacing the same
                    (should @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif wish to do so) will be charged to the Hirer;
                </span>
            </p>
            <p class="subpoints">(o)<span class="content-text">
                    immediately notify @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif should the Equipment become bogged or stuck;
                </span>
            </p>
            <p class="subpoints">(p)<span class="content-text">
                    not move the Equipment from the address where the Equipment was
                    delivered to without the prior written approval of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif;
                </span>
            </p>
            <p class="subpoints">(q)<span class="content-text">
                    provide to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    (upon reasonable notice by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                        @endif) free access to @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif’s
                        Equipment in order that @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif may examine
                </span>
            </p>
            <p class="subpoints">(r)<span class="content-text">
                    or test the equipment or assess Equipment care and maintenance;
                </span>
            </p>
            <p class="subpoints">(s)<span class="content-text">
                    comply with all Environmental laws as in place from time to time and shall
                    immediately rectify any breach of such laws caused by the use of the
                    Equipment.
                </span>
            </p>
            <p>11.2<span class="content-text">The Hirer must:
                </span></p>
            <p class="subpoints">(a)<span class="content-text">
                    when moving the Equipment comply with any and all safety guidelines
                    advised by either @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif or the manufacturer of the Equipment to ensure the
                    Equipment’s safe loading, handling and transportation;

                </span>
            </p>
            <p class="subpoints">(b)<span class="content-text">
                    not at any time attempt to repair Equipment without the prior consent of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif.
                    Where such consent is given if the repairs prove to be defective any way
                    whatsoever, rectification to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s satisfaction will be at the Hirer’s expense.
                </span>
            </p>
            <p>11.3<span class="content-text"> Immediately on request by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif the Hirer will pay:</span></p>
            <p class="subpoints">(a)<span class="content-text">
                    the new list price of any Equipment, accessories or consumables that are
                    for whatever reason destroyed, written off or not returned to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif;
                </span>
            </p>
            <p class="subpoints">(b)<span class="content-text">
                    all costs incurred in cleaning the Equipment (charged at $75.00 + GST per
                    hour);
                </span>
            </p>
            <p class="subpoints">(c)<span class="content-text">
                    all costs of repairing any damage caused through the Hirer’s use of the
                    Equipment i.e. the amount required to restore the Equipment to the
                    Equipment’s pre-hire status;
                </span>
            </p>
            <p class="subpoints">(d)<span class="content-text">
                    the cost of repairing any damage to the Equipment caused by willful or
                    negligent actions of the Hirer;
                </span>
            </p>
            <p class="subpoints">(e)<span class="content-text">
                    the cost of repairing any damage to the Equipment caused by vandalism,
                    theft or burglary, arson or act of god, or (in @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s reasonable opinion) in any
                    way whatsoever other than by the ordinary use of the Equipment by the
                    Hirer;
                </span>
            </p>
            <p class="subpoints">(f)<span class="content-text">
                    the cost of fuels and consumables provided by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif and used by the Hirer;
                </span>
            </p>
            <p class="subpoints">(g)<span class="content-text">
                    any lost hire fees @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif would have otherwise been entitled to for the
                    Equipment, under this, or any other hire agreement;
                </span>
            </p>
            <p class="subpoints">(h)<span class="content-text">
                    any insurance excess payable in relation to a claim made by either the Hirer
                    or @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif in relation to any damage caused by, or to, the hire Equipment
                    whilst
                    the same is hired by the Hirer and irrespective of whether charged by the
                    Hirer’s insurers or @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s
                </span>
            </p>
            <p class="subpoints">(i)<span class="content-text">
                    where the Equipment has been lost or stolen any costs incurred by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif in
                    recovering the Equipment;

                </span>
            </p>
            <p class="subpoints">(j)<span class="content-text">
                    any levies, fines, tolls, penalties, or other government charges arising out of
                    the Hirer’s use of the Equipment.

                </span>
            </p>

            <p><b>12. Credit Card Information</b></p>
            <p>12.1<span class="content-text">The Hirer will:
                </span></p>
            <p class="subpoints">(a)<span class="content-text">
                    keep the Hirer’s personal details, including credit card details for only as
                    long as is deemed necessary by Hirer;
                </span>
            </p>
            <p class="subpoints">(b)<span class="content-text">
                    not disclose the Hirer’s credit card details to any third party;
                </span>
            </p>
            <p class="subpoints">(c)<span class="content-text">
                    not unnecessarily disclose any of the Hirer’s personal information, except
                    in accordance with the Privacy Policy (clause 19) or where required by law.
                </span>
            </p>
            <p>12.2<span class="content-text">The Hirer expressly agrees that, if pursuant to this Contract, there
                    are:
                </span>
            </p>
            <p class="subpoints">(a)
                <span class="content-text">
                    any unpaid charges;
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    other amounts due and outstanding by the Hirer;
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    any Goods (or any part of them) supplied on hire that are subject to any
                    loss, theft or damaged;
                </span>
            </p>
            <p class="subpoints">(d)
                <span class="content-text">
                    any other additional charges are due from the Hirer which were not known
                    at the time of the return of the Goods,
                </span>
            </p>
            <p>12.3<span class="content-text">The Hirer is entitled to immediately charge the Hirer’s nominated
                    credit
                    card for
                    these amounts, and is irrevocably authorised to complete any documentation and
                    take any action to recover from the credit card issuer any and all amounts which
                    may be due by the Hirer pursuant to the terms of this Contract.</span></p>

            <p>13.<b>Personal Property Securities Act 2009 (“PPSA”)
                </b></p>

            <p>13.1<span class="content-text">
                    In this clause financing statement, financing change statement, security
                    agreement, and security interest has the meaning given to it by the PPSA.
                </span></p>
            <p>13.2<span class="content-text"> Upon assenting to these terms and conditions in writing the Hirer
                    acknowledges
                    and agrees that these terms and conditions constitute a security agreement for
                    the purposes of the PPSA and creates a security interest in all Goods and/or
                    collateral (account) – being a monetary obligation of the Hirer to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif for Services
                    – that have previously been supplied and that will be supplied in the future by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    to the Hirer</span></p>
            <p>13.3<span class="content-text">The Hirer undertakes to:</span></p>
            <p class="subpoints">(a)
                <span class="content-text">
                    promptly sign any further documents and/or provide any further
                    information (such information to be complete, accurate and up-to-date in
                    all respects) which @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may reasonably require to;
                </span>
            </p>

            <p class="subpoints-2">(i)
                <span class="content-text">
                    register a financing statement or financing change statement in relation
                    to a security interest on the Personal Property Securities Register;
                </span>
            </p>
            <p class="subpoints-2">(ii)
                <span class="content-text">
                    register any other document required to be registered by the PPSA;
                    or
                </span>
            </p>
            <p class="subpoints-2">(iii)
                <span class="content-text">
                    correct a defect in a statement referred to in clause 13.3(a)(i) or
                    13.3(a)(ii);
                </span>
            </p>

            <p class="subpoints">(b)
                <span class="content-text">
                    indemnify, and upon demand reimburse, @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif for all expenses incurred
                    in registering a financing statement or financing change statement on
                    the Personal Property Securities Register established by the PPSA or
                    releasing any Goods charged thereby;
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    not register a financing change statement in respect of a security interest
                    without the prior written consent of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                </span>
            </p>
            <p class="subpoints">(d)
                <span class="content-text">
                    not register, or permit to be registered, a financing statement or a
                    financing change statement in relation to the Goods and/or collateral
                    (account) in favour of a third party without the prior written consent of
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif;
                </span>
            </p>
            <p class="subpoints">(e)
                <span class="content-text">
                    mmediately advise @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif of any material change in its business practices
                    of selling the Goods which would result in a change in the nature of
                    proceeds derived from such sales
                </span>
            </p>
            <p>13.4<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif and the Hirer agree that sections 96, 115 and 125 of the PPSA do
                    not
                    apply to the security agreement created by these terms and conditions.
                </span></p>
            <p>13.5<span class="content-text">The Hirer waives their rights to receive notices under sections 95,
                    118,
                    121(4),
                    130, 132(3)(d) and 132(4) of the PPSA. </span></p>
            <p>13.6<span class="content-text">The Hirer waives their rights as a grantor and/or a debtor under
                    sections
                    142
                    and 143 of the PPSA. </span></p>
            <p>13.7<span class="content-text"> Unless otherwise agreed to in writing by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif, the Hirer waives their
                    right
                    to
                    receive a verification statement in accordance with section 157 of the PPSA.</span></p>
            <p>13.8<span class="content-text">The Hirer must unconditionally ratify any actions taken by
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif under
                    clauses
                    13.3 to 13.5.
                </span></p>
            <p>13.9<span class="content-text">Subject to any express provisions to the contrary (including those
                    contained
                    in this clause 13) nothing in these terms and conditions is intended to have
                    the effect of contracting out of any of the provisions of the PPSA. </span></p>


            <p>
                <b>14. Collateral & Assignment</b>
            </p>

            <p>14.1<span class="content-text"> The Hirer hereby charges all its right, title and interest in the
                    property or
                    properties referred to in the Hirer’s Credit Application/Quotation/Hire Agreement
                    and also any property or properties that it owns currently or may acquire in the
                    future solely or jointly or have or become to have a beneficial interest in, in favour
                    of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif, with the due and punctual observance and performance of all the
                    obligations of the Hirer. The Hirer indemnifies @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif against all expenses and legal
                    costs (on a solicitor/own Hirer basis) for preparing, lodging and removing any
                    caveat</span></p>
            <p>14.2<span class="content-text"> The Hirer hereby acknowledges that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may at its discretion register
                    and
                    lodge
                    a caveat(s) on such property or properties in respect of the interests conferred on
                    it under clause 14.1. Such registration of a caveat by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif over the Hirer’s
                    property or properties must not be challenged by the Hirer in any way
                    whatsoever, and the Hirer agrees not to take any steps in filing a “lapsing notice”
                    via the Land Titles Office to have the caveat removed, until such time that the
                    Hirer has paid all monies owing by it to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif as claimed from time to time.</span></p>


            <p><b>15. Defects, Warranties and Returns, Competition and Consumer Act 2010
                    (CCA)</b></p>

            <p>15.1<span class="content-text">The Hirer must inspect the Services provided and must within seven
                    (7)
                    days of
                    delivery notify @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif in writing of any evident defect/damage, shortage in quantity,
                    or failure to comply with the description or quote. The Hirer must notify any other
                    alleged defect in the Services provided within two (2) hours after any such defect
                    becomes evident. Upon such notification the Hirer must allow @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif to inspect the
                    defect.
                </span></p>
            <p>15.2<span class="content-text">Under applicable State, Territory and Commonwealth Law (including,
                    without
                    limitation the CCA), certain statutory implied guarantees and warranties
                    (including, without limitation the statutory guarantees under the CCA) may be
                    implied into these terms and conditions <b>(Non-Excluded Guarantees)</b>.</span></p>
            <p>15.3<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif acknowledges that nothing in these terms and conditions purports
                    to
                    modify
                    or exclude the Non-Excluded Guarantees.
                </span></p>
            <p>15.4<span class="content-text">If the Hirer is a consumer within the meaning of the CCA,
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s
                    liability
                    is
                    limited to the extent permitted by section 64A of Schedule 2.
                </span></p>


            <p><b>16. Default and Consequences of Default
                </b></p>


            <p>16.1<span class="content-text">If the Hirer defaults in payment by the due date of any amount
                    payable to
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif,
                    then all money which would become payable by the Hirer to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif at a later date
                    on any account, becomes immediately due and payable without the
                    requirement of any notice to the Hirer, and @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may, without prejudice to any of
                    its other accrued or contingent rights
                </span></p>
            <p class="subpoints">(a)
                <span class="content-text">
                    Interest on overdue invoices shall accrue daily from the date when
                    payment becomes due, until the date of payment, at a rate of two and a
                    half percent (2.5%) per calendar month (and at @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s sole discretion
                    such interest shall compound monthly at such a rate) after as well as
                    before any judgment;
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    charge the Hirer a late payment administration fee equal to 10% of the
                    invoice to a maximum of $200 plus GST;
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    charge the Hirer for, and the Hirer must indemnify @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif from, all costs
                    and expenses (including without limitation all legal costs and expenses
                    and debt collection costs, commissions and expenses) incurred by it
                    resulting from the default or in taking action to enforce compliance with
                    the Agreement;
                </span>
            </p>
            <p class="subpoints">(d)
                <span class="content-text">
                    cease or suspend supply of any further Equipment/Services to the Hirer
                </span>
            </p>
            <p class="subpoints">(e)
                <span class="content-text">
                    by written notice to the Hirer, terminate any uncompleted contract with
                    the Hirer.
                </span>
            </p>
            <p>16.2<span class="content-text">Clauses 16.1(d) and 16.1(e) may also be relied upon, at @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif s
                    option:</span>
            </p>
            <p class="subpoints">(a)
                <span class="content-text">
                    where the Hirer is a natural person and becomes bankrupt or enters into
                    any scheme of arrangement or any assignment or composition with or for
                    the benefit of his or her creditors or any class of his or her creditors
                    generally; or
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    where the Hirer is a corporation and, it enters into any scheme of
                    arrangement or any assignment or composition with or for the benefit of its
                    creditors or any class of its creditors generally, or has a liquidator,
                    administrator, receiver or manager or similar functionary appointed in
                    respect of its assets, or any action is taken for, or with the view to, the
                    liquidation (including provisional liquidation), winding up or dissolution
                    without winding up of the Hirer
                </span>
            </p>

            <p><b>17. Cancellation</b></p>


            <p>17.1<span class="content-text">Without prejudice to any other remedies @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may have, if at any time
                    the
                    Hirer is in
                    breach of any obligation (including those relating to payment) under these terms
                    and conditions @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may suspend or terminate the supply of Equipment/Services to
                    the Hirer. @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif will not be liable to the Hirer for any loss or damage the Hirer
                    suffers
                    because @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif has exercised its rights under this clause. </span></p>
            <p>17.2<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may cancel any contract to which these terms and conditions apply
                    or
                    cancel
                    delivery of Equipment/Services at any time before the Equipment/Services are
                    delivered by giving written notice to the Hirer. On giving such notice @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall
                    repay to the Hirer any money paid by the Hirer for the Equipment/Services. @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall not be
                    liable
                    for any loss or damage whatsoever arising from such
                    cancellation.
                </span></p>
            <p>17.3<span class="content-text">In the event that the Hirer cancels delivery of Equipment/Services
                    the
                    Hirer shall
                    be liable for any and all loss incurred (whether direct or indirect) by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif as a
                    direct result of the cancellation (including, but not limited to, any loss of profits). </span>
            </p>

            <p><b>18. Privacy</b></p>

            <p>18.1<span class="content-text">All emails, documents, images or other recorded information held or
                    used
                    by
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif is Personal Information, as defined and referred to in clause 18.2,
                    and
                    therefore considered Confidential Information. @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif acknowledges its obligation
                    in relation to the handling, use, disclosure and processing of Personal
                    Information pursuant to the Privacy Act 1988 (“the Act”) including the Part IIIC
                    of the Act being Privacy Amendment (Notifiable Data Breaches) Act 2017
                    (NDB) and any statutory requirements, where relevant in a European Economic
                    Area (“EEA”), under the EU Data Privacy Laws (including the General Data
                    Protection Regulation “GDPR”) (collectively, “EU Data Privacy Laws”). @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    acknowledges that in the event it becomes aware of any data breaches and/or
                    disclosure of the Hirers Personal Information, held by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif that may result in
                    serious harm to the Hirer, @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif will notify the Hirer in accordance with the Act
                    and/or the GDPR. Any release of such Personal Information must be in
                    accordance with the Act and the GDPR (where relevant) and must be approved
                    by the Hirer by written consent, unless subject to an operation of law.
                </span></p>
            <p>18.2<span class="content-text">The Hirer agrees for @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif to obtain from a credit reporting body (CRB)
                    a
                    credit
                    report containing personal credit information (e.g. name, address, D.O.B,
                    occupation, previous credit applications, credit history) about the Hirer in relation
                    to credit provided by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                </span>
            </p>
            <p>18.3<span class="content-text">The Hirer agrees that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may exchange information about the Hirer
                    with
                    those
                    credit providers and with related body corporates for the following purposes:</span></p>


            <p class="subpoints">(a)
                <span class="content-text">
                    to assess an application by the Hirer; and/or
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    to notify other credit providers of a default by the Hirer; and/or
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    to exchange information with other credit providers as to the status of
                    this credit account, where the Hirer is in default with other credit
                    providers; and/or
                </span>
            </p>
            <p class="subpoints">(d)
                <span class="content-text">
                    to assess the creditworthiness of the Hirer including the Hirer’s
                    repayment history in the preceding two (2) years.
                </span>
            </p>


            <p>18.4<span class="content-text">The Hirer consents to @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif being given a consumer credit report to
                    collect
                    overdue payment on commercial credit.</span></p>
            <p>18.5<span class="content-text">The Hirer agrees that personal credit information provided may be
                    used and
                    retained by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif for the following purposes (and for other agreed purposes or
                    required by):
                </span></p>

            <p class="subpoints">(a)
                <span class="content-text">
                    the provision of Equipment/Services; and/or
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    analysing, verifying and/or checking the Hirer’s credit, payment and/or
                    status in relation to the provision of Equipment/Services; and/or
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    processing of any payment instructions, direct debit facilities and/or
                    credit facilities requested by the Hirer; and/or
                </span>
            </p>
            <p class="subpoints">(d)
                <span class="content-text">
                    enabling the collection of amounts outstanding in relation to the
                    Equipment/Services.
                </span>
            </p>
            <p>18.6<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may give information about the Hirer to a CRB for the following
                    purposes:
                </span></p>
            <p class="subpoints">()
                <span class="content-text">
                    to obtain a consumer credit report; allow the CRB to create or maintain a
                    credit information file about the Hirer including credit history
                </span>
            </p>
            <p>18.7<span class="content-text">The information given to the CRB may include:</span></p>
            <p class="subpoints">(a)
                <span class="content-text">
                    personal information as outlined in 18.2 above;
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    name of the credit provider and that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif is a current credit provider to the
                    Hirer;
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    whether the credit provider is a licensee;
                </span>
            </p>
            <p class="subpoints">(d)
                <span class="content-text">
                    type of consumer credit;
                </span>
            </p>
            <p class="subpoints">(e)
                <span class="content-text">
                    details concerning the Hirer’s application for credit or commercial credit
                    (e.g. date of commencement/termination of the credit account and the
                    amount requested);
                </span>
            </p>
            <p class="subpoints">(f)
                <span class="content-text">
                    advice of consumer credit defaults, overdue accounts, loan repayments
                    or outstanding monies which are overdue by more than sixty (60) days
                    and for which written notice for request of payment has been made and
                    debt recovery action commenced or alternatively that the Hirer no longer
                    has any overdue accounts and @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif has been paid or otherwise
                    discharged and all details surrounding that discharge (e.g. dates of
                    payments);
                </span>
            </p>
            <p class="subpoints">(g)
                <span class="content-text">
                    information that, in the opinion of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif , the Hirer has committed a serious
                    credit infringement;
                </span>
            </p>
            <p class="subpoints">(h)
                <span class="content-text">
                    advice that the amount of the Hirer’s overdue payment is equal to or
                    more than one hundred and fifty dollars ($150).
                </span>
            </p>
            <p>18.8<span class="content-text">The Hirer shall have the right to request (by e-mail) from
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif :
                </span>
            </p>
            <p>18.9<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif will destroy personal information upon the Hirer’s request (by
                    e-mail)
                    or if it is
                    no longer required unless it is required in order to fulfill the obligations of this
                    contract or is required to be maintained and/or stored in accordance with the law.
                </span></p>
            <p>18.10<span class="content-text">The Hirer can make a privacy complaint by contacting @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif via e-mail.
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    will
                    respond to that complaint within seven (7) days of receipt and will take all
                    reasonable steps to make a decision as to the complaint within thirty (30) days of
                    receipt of the complaint. In the event that the Hirer is not satisfied with the
                    resolution provided, the Hirer can make a complaint to the Information
                    Commissioner at <a href="https://www.oaic.gov.au/">www.oaic.gov.au.</a>
                </span></p>


            <p><b>19. Compliance with Laws</b></p>

            <p>19.1<span class="content-text">The Hirer and @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall comply with the provisions of all statutes,
                    regulations
                    and bylaws of government, local and other public authorities that may be
                    applicable to the Works, including any work health and safety (WHS) laws
                    relating to building/construction sites and any other relevant safety standards or
                    legislation, particularly those in relation to asbestos and/or other hazardous
                    materials (and the safe removal and disposal of the same). The Hirer agrees to
                    indemnify @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif against all claims arising from health issues related to exposure
                    to asbestos at the site.
                </span></p>
            <p>19.2<span class="content-text">The Hirer shall obtain (at the expense of the Hirer) all licenses and
                    approvals
                    that may be required for the Works.</span></p>

            <p><b>20. Trusts</b></p>


            <p>20.1<span class="content-text">If the Hirer at any time upon or subsequent to entering into the
                    Contract
                    is acting
                    in the capacity of trustee of any trust (“Trust”) then whether or not @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may have
                    notice of the Trust, the Hirer covenants with @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif as follows:</span></p>
            <p class="subpoints">(a)
                <span class="content-text">
                    the Contract extends to all rights of indemnity which the Hirer now or
                    subsequently may have against the Trust and the trust fund;
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    the Hirer has full and complete power and authority under the Trust to
                    enter into the Contract and the provisions of the Trust do not purport to
                    exclude or take away the right of indemnity of the Hirer against the Trust
                    or the trust fund. The Hirer will not release the right of indemnity or commit any breach of
                    trust
                    or be a party to any other action which might prejudice
                    that right of indemnity.
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    the Hirer will not without consent in writing of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    (@if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                    will not
                    unreasonably withhold consent), cause, permit, or suffer to happen any of
                    the following events;
                </span>
            </p>

            <p class="subpoints-2">(i)
                <span class="content-text">
                    the removal, replacement or retirement of the Hirer as trustee of the
                    Trust;
                </span>
            </p>
            <p class="subpoints-2">(ii)
                <span class="content-text">
                    any alteration to or variation of the terms of the Trust
                </span>
            </p>
            <p class="subpoints-2">(iii)
                <span class="content-text">
                    any advancement or distribution of capital of the Trust; or
                </span>
            </p>
            <p class="subpoints-2">(iv)
                <span class="content-text">
                    any resettlement of the trust property.
                </span>
            </p>

            <p><b>21. Change In Control</b></p>
            <p>21.1<span class="content-text">The Hirer shall give the supplier not less than fourteen (14) days
                    prior
                    written
                    notice of any proposed change of ownership of the Hirer and/or any other change
                    in the Hirer’s details (including but not limited to, changes in the Hirer’s name,
                    address, contact phone or, change of trustees, or business practice). The Hirer
                    shall be liable for any loss incurred by the supplier as a result of the Hirer’s failure
                    to comply with this clause.
                </span></p>

            <p><b>22. Service of Notices</b></p>
            <p>22.1<span class="content-text"> Any written notice given under this Contract shall be deemed to have
                    been
                    given
                    and received:</span></p>
            <p class="subpoints">(a)
                <span class="content-text">
                    by handing the notice to the other party, in person;
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    by leaving it at the address of the other party as stated in this Contract;
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    by sending it by registered post to the address of the other party as stated
                    in this Contract;
                </span>
            </p>
            <p class="subpoints">(d)
                <span class="content-text">
                    if sent by facsimile transmission to the fax number of the other party as
                    stated in this Contract (if any), on receipt of confirmation of the
                    transmission;
                </span>
            </p>
            <p class="subpoints">(e)
                <span class="content-text">
                    if sent by email to the other party’s last known email address
                </span>
            </p>
            <p class="subpoints">(f)
                <span class="content-text">
                    Any notice that is posted shall be deemed to have been served, unless the
                    contrary is shown, at the time when by the ordinary course of post, the
                    notice would have been delivered.
                </span>
            </p>

            <p><b>23. Errors and Omissions</b></p>

            <p>23.1<span class="content-text">The Hirer acknowledges and accepts that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall, without prejudice,
                    accept no
                    liability in respect of any alleged or actual error(s) and/or omission(s):
                </span></p>
            <p class="subpoints">(a)
                <span class="content-text">
                    resulting from an inadvertent mistake made by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else                    Vaa Transport
                    @endif in the formation and/or
                    administration of this Contract; and/or
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    contained in/omitted from any literature (hard copy and/or electronic)
                    supplied by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else                    Vaa Transport
                    @endif in respect of the Services.
                </span>
            </p>
            <p>23.2<span class="content-text">In the event such an error and/or omission occurs in accordance with
                    clause
                    23.1, and is not attributable to the negligence and/or willful misconduct of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else                    Vaa Transport
                    @endif ; the
                    Hirer shall not be entitled to treat this Contract as repudiated nor render it invalid.</span>
            </p>


            <p><b>24. Electronic Payments Act</b></p>

            <p>24.1<span class="content-text"> Electronic signatures shall be deemed to be accepted by either party
                    providing
                    that the parties have complied with Section 9 of the Electronic Transactions Act
                    2000 (NSW), the Electronic Communications Act 2000 (SA), the Electronic
                    Transactions Act 2001 (ACT), the Electronic Transactions (Northern Territory) Act
                    2000, Section 14 of the Electronic Transactions (Queensland) Act 2001, Section
                    7 of the Electronic Transactions Act 2000 (TAS), Section 10 of the Electronic
                    Transactions Act 2011 (WA), (whichever is applicable), or any other applicable
                    provisions of that Act or any Regulations referred to in that Act. </span></p>


            <p><b>25. Force Majeure
                </b></p>

            <p>25.1<span class="content-text"> Neither @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif or the Hirer shall be liable for any default on a Project
                    due
                    to any
                    force majeure act, event or cause other than lack of funds which is beyond the
                    reasonable control of that party, including:</span></p>

            <p class="subpoints">(a)
                <span class="content-text">
                    Act of God, peril of the sea, accident of navigation, war, sabotage, riot,
                    insurrection, civil commotion, national emergency (whether in fact or law),
                    martial law, fire, lightning, flood, cyclone, earthquake, landslide, storm or
                    other adverse weather conditions, explosion, power shortage, strike or
                    other labour difficulty (whether or not involving employees of the party
                    concerned), epidemic, quarantine, radiation or radioactive contamination;
                </span>
            </p>
            <p class="subpoints">(b)
                <span class="content-text">
                    Action or inaction of any government or governmental or other competent
                    authority (including any court of competent jurisdiction), including
                    expropriation, restraint, prohibition, intervention, requisition, requirement,
                    direction or embargo by legislation, regulation, decree or other legally
                    enforceable order; and
                </span>
            </p>
            <p class="subpoints">(c)
                <span class="content-text">
                    Breakdown of plant, machinery or equipment or shortages of labour,
                    transportation, fuel, power or plant, machinery, equipment or materia
                </span>
            </p>


            <p><b>26. General</b></p>
            <p>26.1<span class="content-text">The failure by either party to enforce any provision of these terms
                    and
                    conditions shall not be treated as a waiver of that provision, nor shall it affect
                    that party’s right to subsequently enforce that provision. If any provision of these
                    terms and conditions shall be invalid, void, illegal or unenforceable the validity,
                    existence, legality and enforceability of the remaining provisions shall not be
                    affected, prejudiced or impaired. </span></p>
            <p>26.2<span class="content-text">These terms and conditions and any contract to which they apply shall
                    be
                    governed by the laws of Victoria, the state in which @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif has its principal place of
                    business and are subject to the jurisdiction of the courts in Pakenham</span></p>
            <p>26.3<span class="content-text">Subject to clause 8, @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif shall be under no liability whatsoever to the
                    Hirer for
                    any indirect and/or consequential loss and/or expense (including loss of profit)
                    suffered by the Hirer arising out of a breach by @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif of these terms and
                    conditions (alternatively @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif’s liability shall be limited to damages which under
                    no circumstances shall exceed the Price of the Equipment/Services).
                </span></p>
            <p>26.4<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may licence and/or assign all or any part of its rights and/or
                    obligations
                    under this contract without the Hirer’s consent.
                </span></p>
            <p>26.5<span class="content-text"> The Hirer cannot licence or assign without the written approval of
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif
                </span></p>
            <p>26.6<span class="content-text">
                    @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may elect to subcontract out any part of the Services but shall
                    not be
                    relieved from any liability or obligation under this contract by so doing.
                    Furthermore, the Hirer agrees and understands that they have no authority to
                    give any instruction to any of @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                        @endif’s subcontractors without the authority of @if ($company_name == 'Mahajan Group')
                            MG
             @elseif ($company_name == 'EMM Kay Group')
                            EMM KAY
                        @else
                            Vaa Transport
                        @endif.
                </span></p>
            <p>26.7<span class="content-text">The Hirer agrees that @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif may amend these terms and conditions by
                    notifying
                    the Hirer in writing. These changes shall be deemed to take effect from the date
                    on which the Hirer accepts such changes, or otherwise at such time as the Hirer
                    makes a further request for @if ($company_name == 'Mahajan Group')
                        MG
         @elseif ($company_name == 'EMM Kay Group')
                        EMM KAY
                    @else
                        Vaa Transport
                    @endif to provide Equipment/Services to the Hirer</span></p>
            <p>26.8<span class="content-text">Neither party shall be liable for any default due to any act of God,
                    war,
                    terrorism, strike, lockout, industrial action, fire, flood, storm or other event
                    beyond the reasonable control of either party.</span></p>
            <p>26.9<span class="content-text">Both parties warrant that they have the power to enter into this
                    contract
                    and
                    have obtained all necessary authorisations to allow them to do so, they are not
                    insolvent and that this contract creates binding and valid legal obligations on
                    them.</span></p>

        </div>
    </div>
</body>

</html>
