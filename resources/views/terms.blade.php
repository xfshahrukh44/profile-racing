@extends('layouts.main')

@section('css')
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->



<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2>Terms & Policies</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="terms-policy">
    <div class="container">
        <div class="row">
{{--            <div class="col-lg-7">--}}
            <div class="col-lg-12">
                <div class="policy-main">
                    {!! $page->sections[0]->value ?? '' !!}
{{--                    <h4>Effective Date: May 28, 2018 </h4>--}}
{{--                    <p>This privacy policy discloses the privacy practices for Profile Racing, Inc. (“Profile”) and--}}
{{--                        our website, http://www.profileracing.com (the “Site”). By using the Site, you consent to--}}
{{--                        our privacy policy. This policy applies solely to information collected by the Site,--}}
{{--                        except where stated otherwise. It will notify you of the following:</p>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            What information we collect;--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            How we use such information;--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            With whom it is shared;--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            How it can be corrected;--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            How it is secured;--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            How policy changes will be communicated; and--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            How to address concerns over misuse of personal data.--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <h3>PRIVACY POLICY</h3>--}}
{{--                    <h5>INFORMATION WE COLLECT</h5>--}}
{{--                    <p>At PROFILERACING.COM you can do a variety of things! You may order products, subscribe to a--}}
{{--                        service (like our email newsletter) or contact us via email. The types of personal--}}
{{--                        identifiable information (i.e. information that can directly identify you or indicate--}}
{{--                        where you might be contacted) that may be collected on the Site includes information that--}}
{{--                        you voluntarily provide to us such as your name, address, age, date of birth, sex, grade--}}
{{--                        level, e-mail address, telephone number, fax number, and information about your interests--}}
{{--                        in and use of various products, programs, and services. Please note that we will not store--}}
{{--                        or collect your payment card details. That information is provided directly to our--}}
{{--                        third-party payment processors, whose use of your personal information is governed by--}}
{{--                        their Privacy Policy.</p>--}}
{{--                    <p>Sometimes you can submit information about other people. For example, you might submit a--}}
{{--                        person’s name and e-mail address to send an electronic greeting card and, if you order a--}}
{{--                        gift online and want it sent directly to a friend, you might submit the friend’s name and--}}
{{--                        address. The types of personal identifiable information that may be collected about other--}}
{{--                        people at these pages may include: recipient’s name, address, age, date of birth, grade--}}
{{--                        level, e-mail address, sex and telephone number.</p>--}}
{{--                    <p>When you visit the Site or open an email from us, we may automatically receive and record--}}
{{--                        certain information from your computer, web browser and/or mobile device, including your--}}
{{--                        IP address or other device address or ID, web browser and/or device type, hardware and--}}
{{--                        software settings and configurations, the web pages or sites that you visit just before or--}}
{{--                        just after visiting the website, the pages you view on our website, your actions while--}}
{{--                        interacting with the site, and the dates and times that you visit, access, or use the--}}
{{--                        site. When you use the site on a mobile device, we may also collect the physical location--}}
{{--                        of your device by, for example, using satellite, cell phone tower or wireless local area--}}
{{--                        network signals.</p>--}}
{{--                    <h5>YOUR ACCESS TO AND CONTROL OVER INFORMATION</h5>--}}
{{--                    <p>You may opt out of any future contacts from us at any time. You can do the following at any--}}
{{--                        time by contacting us through any means outlined at the bottom of this policy:</p>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            See what data we have about you, if any;--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            Change/correct any data we have about you;--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            Have us delete any data we have about you; and/or--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            Express any concern you have about our use of your data.--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <p>Please note that we may ask you to verify your identity before responding to such requests.--}}
{{--                    </p>--}}
{{--                    <h5>USE OF YOUR INFORMATION</h5>--}}
{{--                    <p>We will use the personal information you provide online for the purpose(s) you have--}}
{{--                        submitted it for. Examples of us using your personal information for the purpose(s)--}}
{{--                        submitted include engaging in customer support, fulfilling a request initiated by you,--}}
{{--                        improving our services, fulfilling orders made through our website. Specific examples--}}
{{--                        include if you order a catalog, we will send to you a catalog in the mail or if you have--}}
{{--                        won a contest, sending to you an email notification that you have won. In addition, we may--}}
{{--                        send to you an e-mail offering products or services which we think you may be interested--}}
{{--                        in or to ask you to participate in a survey. For example, we may send to you an e-mail--}}
{{--                        regarding special merchandise offers and announcements about products or services offered--}}
{{--                        by Profile Racing. We may also contact you offline. For example, when you provide your--}}
{{--                        mailing address, Profile Racing may send to you in the mail special offers, promotions and--}}
{{--                        catalogs, which we think may be of interest to you. If you want us to stop using the--}}
{{--                        personal information you provided in these ways, please contact us at--}}
{{--                        info@profileracing.com.</p>--}}
{{--                    <h5>HOW WE SHARE YOUR PERSONAL INFORMATION</h5>--}}
{{--                    <p>We will not sell your information. Nor will we share with any third parties the personal--}}
{{--                        information you provide except (a) if it is for the purpose(s) you provided it (such as--}}
{{--                        fulfilling an order or other request); (b) with your consent; (c) as may be required by--}}
{{--                        law or as we think necessary to protect our company or others from injury (e.g. in--}}
{{--                        response to a court order or subpoena, in response to a law enforcement agency request or--}}
{{--                        when we believe that someone is causing (or about to cause) injury to or interference with--}}
{{--                        the rights or property of another); (d) with other persons or companies with whom we--}}
{{--                        contract to carry out internal site operations or our business activities (for example,--}}
{{--                        sending out a product or a promotional item that you have requested on the site); (e)--}}
{{--                        notifying you when we make changes to one of our subscriber agreements or this policy;--}}
{{--                        and/or (f) as otherwise authorized by this Privacy Policy. Where applicable, we will seek--}}
{{--                        to obtain your consent at the place where the information is collected either by an--}}
{{--                        “opt-in” or “opt-out” method, or by other means (such as sending to you an e-mail).</p>--}}
{{--                    <h5>SERVICE PROVIDERS</h5>--}}
{{--                    <p>We may employ third party companies and individuals to facilitate our Site (“Service--}}
{{--                        Providers”), to provide services on our behalf, or to perform Site-related services. These--}}
{{--                        third parties may have access to your personal information only to perform these tasks on--}}
{{--                        our behalf and they are obligated not to disclose or use it for any other purpose. We may--}}
{{--                        also use third-party Service Providers such as Google Analytics to monitor and analyze the--}}
{{--                        use of our Site. Google Analytics is a web analytics service offered by Google that tracks--}}
{{--                        and reports website traffic. Google uses the data collected to track and monitor the use--}}
{{--                        of our Site. This data is shared with other Google services. Google may use the collected--}}
{{--                        data to contextualize and personalize the ads of its own advertising network. You can--}}
{{--                        opt-out of having made your activity on the Service available to Google Analytics by--}}
{{--                        installing the Google Analytics opt-out browser add-on. The add-on prevents the Google--}}
{{--                        Analytics JavaScript (ga.js, analytics.js, and dc.js) from sharing information with Google--}}
{{--                        Analytics about visits activity. For more information on the privacy practices of Google,--}}
{{--                        please visit the Google Privacy Terms web page:--}}
{{--                        http://www.google.com/intl/en/policies/privacy/</p>--}}
{{--                    <h5>USE AND DISCLOSURE OF ANONYMOUS INFORMATION</h5>--}}
{{--                    <p>We sometimes use the non-personal identifiable information that we collect to improve the--}}
{{--                        design and content of our site and to enable us to personalize your Internet experience.--}}
{{--                        We also may use this information in the aggregate to analyze how our site is used, as well--}}
{{--                        as to offer you products, programs or services. Sometimes we share aggregate information--}}
{{--                        with others, including affiliated companies and non-affiliated companies.</p>--}}
{{--                    <h5>SECURITY</h5>--}}
{{--                    <p>The security of your information is important to us. When you submit personal information--}}
{{--                        via the Site, your information is protected both online and offline. Whenever we collect--}}
{{--                        personal information, that information is encrypted and transmitted to us in a secure way.--}}
{{--                        You can verify this by looking for a closed lock icon at the bottom of your web browser,--}}
{{--                        or looking for “https” at the beginning of the address of the web page.</p>--}}
{{--                    <p>While we use encryption to protect personal information transmitted online, we also protect--}}
{{--                        your information offline. Only employees who need the information to perform a specific--}}
{{--                        job (e.g. billing or customer service) are granted access to personally identifiable--}}
{{--                        information. The computers/servers on which we store personally identifiable information--}}
{{--                        are kept in a secure environment.--}}

{{--                    </p>--}}
{{--                    <p>Notwithstanding, please remember that no matter the method of transmission over the--}}
{{--                        Internet, no method of electronic storage is 100% secure. While we strive to use--}}
{{--                        commercially acceptable means to protect your information, we cannot guarantee its--}}
{{--                        absolute security.--}}

{{--                    </p>--}}
{{--                    <h5>COOKIES</h5>--}}
{{--                    <p>To enhance your online experience with us, many of our web pages use “cookies.” Cookies are--}}
{{--                        text files placed on your hard disk by our web server to store your preferences. Cookies,--}}
{{--                        by themselves, do not tell us your e-mail address or other personal identifiable--}}
{{--                        information unless you choose to provide this information to us. However, once you choose--}}
{{--                        to provide the personal identifiable information, this information may be linked to the--}}
{{--                        data stored in the cookie. Cookies cannot be used to run programs or deliver viruses to--}}
{{--                        your computer.</p>--}}
{{--                    <p>We use cookies as a convenience feature to save you time, to understand how our site is--}}
{{--                        used, and to improve the content and offerings on our site. For example, we may use--}}
{{--                        cookies to personalize your experience at our web pages or recall your specific--}}
{{--                        information on subsequent visits (e.g. to recognize you by name when you return to our--}}
{{--                        site). We also may use cookies to offer you products, programs or services. You can opt to--}}
{{--                        have your browser reject cookies. If you do that, you may need to re-register with us--}}
{{--                        every time you visit our site in order to participate in certain promotions and other--}}
{{--                        interactive events.</p>--}}
{{--                    <h5>DO NOT TRACK</h5>--}}
{{--                    <p>Third parties such as ad networks and analytic providers may collect information about your--}}
{{--                        online activities over time and the various websites you access. Currently, various--}}
{{--                        browsers offer a “Do Not Track” (DNT) option, but there is no standard for how DNT should--}}
{{--                        work on commercial websites. For that reason, the Site does not currently respond to Do--}}
{{--                        Not Track consumer browser settings.</p>--}}
{{--                    <h5>CHILDREN’S PRIVACY</h5>--}}
{{--                    <p>Protecting the privacy of young children is especially important. For that reason, we do not--}}
{{--                        allow children under 13 years of age to use the Site, we do not knowingly collect or--}}
{{--                        maintain information from persons under 13 years of age, and no part of the Site is--}}
{{--                        directed to persons under 13 years of age. We do not knowingly sell products for purchase--}}
{{--                        by children and all children’s products we sell are for purchase by adults only, or with--}}
{{--                        adult permission.</p>--}}
{{--                    <p>If you are under 13 years of age, then please do not use or access the Site at any time or--}}
{{--                        in any manner. If we learn that information has been collected through the Site from--}}
{{--                        persons under 13 years of age and without verifiable parental consent, then we will take--}}
{{--                        the appropriate steps to delete the information. If you believe that your child under 13--}}
{{--                        has gained access to the Site without your permission, you may contact us at--}}
{{--                        info@profileracing.com</p>--}}
{{--                    <h5>LINKS & COLLECTION OF INFORMATION BY OTHERS</h5>--}}
{{--                    <p>The Site may contain links to other sites whose information practices may be different than--}}
{{--                        ours. Please be aware that we are not responsible for the content or privacy practices of--}}
{{--                        such other sites. We encourage our users to be aware when they leave our website and to--}}
{{--                        read the privacy statements of any other site that collects personally identifiable--}}
{{--                        information. You should check the other sites’ privacy notices since we have no control--}}
{{--                        over information that is submitted to or collected by them.</p>--}}
{{--                    <h5>INTERNATIONAL USERS</h5>--}}
{{--                    <p>If you are visiting the Site from a location outside of the United States, your connection--}}
{{--                        will be through and to servers located in the United States, your orders placed through--}}
{{--                        the Site will be fully processed in and shipped from the United States and all information--}}
{{--                        you provide will be processed and securely maintained in our web servers and internal--}}
{{--                        systems located within the United States. By using the Site, you authorize the export of--}}
{{--                        personal information to the USA and its storage and use as specified above when you--}}
{{--                        provide such information to us. We will only use your information only for as long as is--}}
{{--                        necessary for the purposes set out in this policy. This policy and our legal obligations--}}
{{--                        are subject to the laws of the State of Florida and the USA, regardless of the location of--}}
{{--                        any user. Any claims or complaints must be filed in the USA in the State of Florida.</p>--}}
{{--                    <h5>NOTIFICATION OF CHANGES</h5>--}}
{{--                    <p>We reserve the right, at our discretion, to change, modify, add, or remove portions from--}}
{{--                        this policy at any time. If we change the policy in a material way, a notice will be--}}
{{--                        posted on the Site with the updated policy or we will let you know via email. Any--}}
{{--                        amendments to our policy will be posted on this page. Your continued use of the Site--}}
{{--                        following the posting of any changes to this policy means you accept such changes.</p>--}}
{{--                    <h5>CONTACTING US</h5>--}}
{{--                    <p>If you have questions or concerns about our privacy practices or wish to make a request--}}
{{--                        regarding your Information, please contact us via the Contact page on the Site, email at--}}
{{--                        info@profileracing.com, or through mail to the following address:</p>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            Profile Racing, Inc.--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            Attn: Privacy Policy--}}

{{--                        </li>--}}
{{--                        <li>--}}
{{--                            4803 95th Street North--}}

{{--                        </li>--}}
{{--                        <li>St. Petersburg, FL 33708</li>--}}
{{--                    </ul>--}}
{{--                    <h4>ORDERS & SHIPPING</h4>--}}
{{--                    <h5>ONLINE ORDER RESPONSE TIME</h5>--}}
{{--                    <p>Each online order is processed the following business day after the order is placed and you receive a confirmation email. If your order is out of stock you will be contacted within 24 to 48 business hour to confirm product availability & options, delivery time, and to address any concerns you may have about your online purchase. Because we assemble most online orders to your personal specifications your order may not ship for up to 2 – 3 business days from receipt of your confirmation. Our cut-off time for online orders is 9:00 a.m. (Eastern). Normally, orders will ship between 2 – 3 business days after processing begins (excluding holidays) regardless of your shipping method selected.  If you have questions regarding the estimated delivery date for any order, please email our customer support team prior to placing your order at info@profileracing.com. Please note that your order may be subject to additional verification of address or product availability. If more information is needed, you will be contacted by a customer service representative shortly after placing your order. You will receive a second email as soon as your order has been verified and processed. To expedite the processing of your order, please be available at the phone number or email address you provided so that we are able to contact you. If our verification department is unable to reach you, your order may be considerably delayed.</p>--}}
{{--                    <h5>SALES TAX</h5>--}}
{{--                    <p>Sales tax is collected on orders shipping to or from Florida at the rate of 7%.</p>--}}
{{--                    <h5>WHAT ELSE SHOULD I KNOW?</h5>--}}
{{--                    <p>All online orders are subject to management approval. Volume orders may not qualify for special promotions, and could require prepayment by postal money order or bank wire transfer.</p>--}}
{{--                    <p>To prevent shipping charge fraud, under no circumstance will we ship merchandise on a UPS, FedEx, or DHL account other than ours. We will not bill shipping charges to the recipient’s account or to a third-party account.</p>--}}
{{--                    <p>We understand the importance to receive your order in a timely manner but our online order-policy prohibits shipping to an address other than to the billing address. It is most unfortunate that dishonest people have created this situation that then affects honest customers like yourself. For this we are truly sorry. It is possible to add a second billing address to your credit card or PayPal account. Then you can use your alternate billing address as a ship to address. Please call your credit card issuing bank (bank name and telephone number is identified on the reverse side of your card). They will help you make the added address change. PayPal (www.paypal.com) support also has information to add an alternate billing address as a shipping address.</p>--}}
{{--                    <p>All orders at or above $750.00 USD before shipping will be sent with a signature required.</p>--}}
{{--                    <p>Profile Racing reserves the right to cancel orders and refund the payment method due to pricing errors or a suspected fraudulent transactions.</p>--}}
{{--                    <h5>INTERNATIONAL SHIPPING</h5>--}}
{{--                    <p>International customers purchasing from our online store are responsible for any applicable VAT/Import Duties that their home country may charge. These fees will be assessed to you by the shipping company that delivers your order. Customers will be responsible for all freight charges and any fees associated (to customer address and return to Profile Racing, USA) with any refused packages, no matter the reason.</p>--}}
{{--                    <h5>LOST PACKAGES</h5>--}}
{{--                    <p>Most time investigations take 7 to 10 business days. However, this is just an estimate. Some packages are found and delivered. In cases where a package is found and delivered, the shipping will be refunded to you the customer.</p>--}}
{{--                    <p>If a package is deemed lost or damage at the time of USPS’s/UPS’s conclusion of their investigation a replacement package/order is sent. The same shipping method will be used as the original order. Shipping charges will be refunded to you the customer.</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
