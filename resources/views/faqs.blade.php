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
                    <h2>FAQs</h2>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="faq-s-pg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-faqs">
                    <div class="faq-one">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            Profile Elite Rear Hub: Exploded Image
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Ever wonder what order your Elite Internals go in?</p>
                                        <p>We hope this exploded image helps.</p>
                                        <p>If you have any further questions, feel free to hit up our tech
                                            dept. gus@profileracing.com</p>
                                        <img src="{{asset('images/Elite-Hub-Exploded-Drawing.jpg')}}" class="img-fluid"
                                             alt="">
                                        <ul>
                                            <li>
                                                A. Bolt and Washer

                                            </li>

                                            <li>
                                                B. Drive side Cone (3/8) or Drive side jam nut (14mm)

                                            </li>
                                            <li>
                                                C. Non drive cone (3/8) or Non drive jam nut (14mm)

                                            </li>
                                            <li>
                                                D. Driver Shim

                                            </li>
                                            <li>
                                                E. Hub Body Bearing

                                            </li>
                                            <li> F. Driver

                                            </li>
                                            <li>
                                                G. Inner 3/8 axle or 14mm axle

                                            </li>
                                            <li>
                                                H. Hub Shell
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                            Profile ZCoaster Driver Tutorials
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Here is everything you need to know about the ZCoaster driver.
                                            Have a look and get familiar.
                                            Thanks for the support!</p>
                                        <iframe src="https://www.youtube.com/embed/5XvTIas0Meg" width="640"
                                                height="315" frameborder="0"
                                                allowfullscreen="allowfullscreen"></iframe>
                                        <ul>
                                            <h4>Section 1.</h4>
                                            <li>

                                                Removal of Spiral Retaining Ring Steps:

                                            </li>
                                            <li>
                                                1. Remove Flat Spring Spacer or Cassette spacer from driver.

                                            </li>
                                            <li>
                                                2. Snap off open end of retaining ring with small screw
                                                driver.

                                            </li>
                                            <li>
                                                3. By hand, begin to unwrap retaining ring in a CLOCKWISE
                                                rotation until it is fully unwound from driver.
                                            </li>
                                        </ul>
                                        <ul>
                                            <h4> Section 2.</h4>
                                            <li>

                                                Installation of Spriral Retaining Ring with Two-Piece Tool
                                                Steps:

                                            </li>
                                            <li>
                                                1. Be sure Flat Spring or Cassette Spacer is not in driver.

                                            </li>
                                            <li>
                                                2. Place conical shaped tool piece (wide side down) inside
                                                the three Spiral Ring Retainer Prongs.

                                            </li>
                                            <li>
                                                3. Place Spiral Retaining Ring onto cone.

                                            </li>
                                            <li>
                                                4. Place opened end of second tool piece on top of the
                                                Spiral Retaining Ring and press down until it snaps into
                                                prongs.
                                            </li>
                                        </ul>
                                        <ul>
                                            <h4> Section 3.</h4>
                                            <li>

                                                Installation of Spiral Retaining Ring by Hand.

                                            </li>
                                            <li>
                                                1. Slightly spread Spiral Retaining open with fingers.

                                            </li>
                                            <li>
                                                2. Place opened end of ring into one the retaining prongs.

                                            </li>
                                            <li>
                                                3. In a counter clockwise motion, carefully wind Retaining
                                                Ring around the prongs until the other end is securely in
                                                place.

                                            </li>
                                            <li>
                                                *Part 3 can be tricky so take your time and be careful not
                                                to bend the ring. We suggest you use the tool for this.
                                            </li>
                                        </ul>
                                        <ul>
                                            <h4> Section 4.</h4>
                                            <li>

                                                Installation of Cassette Spacer.

                                            </li>
                                            <li>
                                                1. Remove Flat Spring Spacer.

                                            </li>
                                            <li>
                                                2. Remove Spiral Retaining Ring.

                                            </li>
                                            <li>
                                                3. Remove Slack-Cam Ring (This will not be needed when using
                                                driver as a cassette).

                                            </li>
                                            <li>
                                                4. Re-install Spiral Retaining Ring.
                                            </li>
                                            <li>
                                                5. Install Cassette Spacer.
                                                *Your hub will now function as an Elite Cassette Hub.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            Q and A: Which direction do my hub springs go into my driver?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>This is actually a pretty common question. With no further ado,
                                            let's get to brass tax.</p>
                                        <h5> Q: For 4 pawl/4 spring Rear Madera V-2, Profile Mini, and Profile
                                            Totems?</h5>
                                        <p>A: Our springs are in the shape of a number nine. For these hubs,
                                            the number nine should be facing out of the driver.</p>
                                        <img src="{{asset('images/Mini-Driver-Close-Up-1-1024x1002.jpg')}}"
                                             class="img-fluid" alt="">
                                        <img src="{{asset('images/Mini-Driver-Close-Up-2.jpg')}}" class="img-fluid" alt="">
                                        <h5>Q: For 6 pawl/6 spring Profile Elite Race, 14mm GDH, and MTB?</h5>

                                        <p>A: Our springs are in the shape of a number nine. For these hubs,
                                            the number nine should be facing inwards towards the center of
                                            the driver.

                                        </p>
                                        <img src="{{asset('images/Elite-Driver-Close-Up-1-1024x936.jpg')}}"
                                             class="img-fluid" alt="">
                                        <img src="{{asset('images/Elite-Driver-Close-Up-2.jpg')}}" class="img-fluid"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsefour" aria-expanded="false"
                                                aria-controls="collapsefour">
                                            Q and A: What is the difference between each Profile/Madera rear
                                            hub?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We get consistent inquiries asking us to differentiate between each
                                            of our rear hubs.
                                            To help you out, I’ve lettered each one below followed by any
                                            questions you might have.
                                            Hope this helps? And again, all of our product is Made in The
                                            USA.</p>
                                        <h5>A. Madera V-2 Rear Hub.</h5>
                                        <ul>
                                            <li>
                                                Q: What type of material is the center axle made from?
                                            </li>
                                            <li>
                                                A: The Madera V-2 Rear hub comes standard with either a 14mm
                                                GDH chromo axle or an aluminum rear internal female axle.
                                                For 3/8, the standard bolts are chromo 8mm allen head with
                                                aluminum volcano washers, but you can upgrade at no charge
                                                to 3/8 to 14mm chromo button head bolts or 3/8 to 14mm
                                                chromo 17mm hex bolts.
                                                If you’re hard on rear hubs, especially on street, we
                                                recommend the 14mm chromo GDH version.
                                            </li>
                                            <li>
                                                Q: For what style of riding can I use this?

                                            </li>
                                            <li>
                                                A: Ramp, Street, and Race. Basically, anything.
                                            </li>
                                            <li>
                                                Q: Is there an LHD version?
                                            </li>
                                            <li>
                                                A: Yes.
                                            </li>
                                            <li>
                                                Q: What colors does the Madera V-2 Rear Hub come in?
                                            </li>
                                            <li>
                                                A: Black, Nickel, Matte Red, Rust (orange), and Matte Raw.
                                            </li>
                                            <li>
                                                Q: Is the Madera V-2 Rear Hub warrantied?
                                            </li>
                                            <li>
                                                A: There is a manufacturer’s warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.
                                            </li>
                                            <li>
                                                <h5>B. Profile Mini Rear Hub.</h5>
                                            </li>
                                            <li>
                                                Q: What type of material is the center axle made from?
                                            </li>
                                            <li>
                                                A: The Profile Mini Rear Hub comes standard with either a
                                                14mm GDH chromo axle or an aluminum rear internal female
                                                axle.
                                                For 3/8, the standard bolts are chromo 8mm allen head with
                                                aluminum volcano washers, but you can upgrade at no charge
                                                to 3/8 to 14mm chromo button head bolts or 3/8 to 14mm
                                                chromo 17mm hex bolts.
                                                If you’re hard on rear hubs, especially on street, we
                                                recommend the 14mm chromo GDH version.
                                            </li>
                                            <li>
                                                Q: For what style of riding can I use this?
                                            </li>
                                            <li>
                                                A: Ramp, Street, and Race. Basically, anything.
                                            </li>
                                            <li>
                                                Q: Is there an LHD version?
                                            </li>
                                            <li>
                                                A: Yes.
                                            </li>
                                            <li>
                                                Q: What colors does the Mini Rear Hub come in?
                                            </li>
                                            <li>A: Black, Matte Back, Polished, Red, Blue, Gold, Aqua, White,
                                                Green, Anti-freeze Green, Matte Army Green, and we do
                                                special colors every two months.</li>
                                            <li>
                                                Q: Is the Profile Mini Rear Hub warrantied?
                                            </li>
                                            <li>
                                                A: There is a manufacturer’s warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.
                                            </li>
                                            <li>
                                                <h5>C. Profile Totem Rear Hub.</h5>
                                            </li>
                                            <li>
                                                Q: What type of material is the center axle made from?
                                            </li>
                                            <li>
                                                A: The Profile Totem Rear Hub comes standard with either a
                                                14mm GDH chromo axle or an aluminum rear internal female
                                                axle.
                                                For 3/8, the standard bolts are chromo 8mm allen head with
                                                aluminum volcano washers, but you can upgrade at no charge
                                                to 3/8 to 14mm chromo button head bolts or 3/8 to 14mm
                                                chromo 17mm hex bolts.
                                                If you’re hard on rear hubs, especially on street, we
                                                recommend the 14mm chromo GDH version.
                                            </li>
                                            <li>Q: For what style of riding can I use this?</li>
                                            <li>A: Ramp, Street, and Race. Basically, anything.</li>
                                            <li>
                                                Q: Is there an LHD version?
                                            </li>
                                            <li>
                                                A: Yes.
                                            </li>
                                            <li>
                                                Q: What colors does the Totem Rear Hub come in?
                                            </li>
                                            <li>
                                                A: Black, Red, and Gun Metal Silver.
                                            </li>
                                            <li>
                                                Q: Is the Profile Totem Rear Hub warrantied?
                                            </li>
                                            <li>
                                                A: There is a manufacturer’s warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.
                                            </li>
                                            <li>
                                                <h5>D. Profile Elite Rear Hub.</h5>
                                            </li>
                                            <li>Q: What type of material is the center axle made from?</li>
                                            <li>
                                                A: The Elite Rear Hub comes standard with either a 14mm
                                                chromo GDH axle or an aluminum rear internal female axle.
                                                For 3/8, the standard bolts are chromo 8mm allen head with
                                                aluminum volcano washers, but you can upgrade at no charge
                                                to 3/8 to 14mm chromo button head bolts or 3/8 to 14mm 17mm
                                                hex chromo bolts.
                                            </li>
                                            <li>Q: What is the difference between the Totem Rear and Elite
                                                Rear?</li>
                                            <li>A: The Totem Rear Hub has 4 pawl engagement (96 points, same
                                                as a Mini), where the Elite has 6 pawl engagement (204
                                                points total).
                                                The Elite also has a bigger size drive side flange to fit
                                                the larger Elite driver.</li>
                                            <li>
                                                Q: For what style of riding can I use this?

                                            </li>
                                            <li>A: Ramp, Street, and Race. Basically, anything.

                                            </li>
                                            <li>
                                                Q: Is there an LHD version?
                                            </li>
                                            <li>A: Yes.</li>
                                            <li>
                                                Q: What colors does the Elite Rear Hub come in?
                                            </li>
                                            <li>
                                                A: Black, Matte Back, Polished, Red, Blue, Gold, Aqua,
                                                White, Green, Matte Army Green, and we do special colors
                                                every two months.
                                            </li>
                                            <li>
                                                Q: Is the Profile Elite Rear Hub warrantied?
                                            </li>
                                            <li>
                                                A: There is a manufacturer’s warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.
                                            </li>
                                        </ul>
                                        <img src="{{asset('images/Rear-Hub-Spread-1024x648.jpg')}}" class="img-fluid"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingfive">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsefive" aria-expanded="false"
                                                aria-controls="collapsefive">
                                            Q and A: What is the difference between each Profile/Madera front
                                            hub?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapsefive" class="collapse" aria-labelledby="headingfive"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We get consistent inquiries asking us to differentiate between each
                                            of our front hubs.
                                            To help you out, I've lettered each one below followed by any
                                            questions you might have.
                                            Hope this helps? And again, all of our product is Made in The
                                            USA.</p>
                                        <ul>
                                            <li>
                                                <h5>
                                                    <h5>A. Madera Pilot Front Hub.</h5>
                                                </h5>
                                            </li>
                                            <li>
                                                Q: What type of material is the center axle made from?
                                            </li>
                                            <li>
                                                A: The Pilot front hub comes standard with an aluminum front
                                                internal female axle.
                                            </li>
                                            <li>The standard bolts are chromo 8mm allen head with aluminum
                                                volcano washers, but you can upgrade at no charge to 3/8
                                                chromo button head bolts or 3/8 17mm hex chromo button
                                                bolts.
                                                Tried and tested (for 14 years), the aluminum inner axle is
                                                incredibly durable. However, if you would rather have a
                                                steel option, we do offer chromo inner axles as well a 14mm
                                                chromo GHD version.</li>
                                            <li>Q: For what style of riding can I use this?</li>
                                            <li>
                                                A: Ramp, Street, and Race. Basically, anything.
                                            </li>
                                            <li>
                                                Q: What colors does the Madera Pilot Front Hub come in?
                                            </li>
                                            <li>
                                                A: Black, Nickel, Matte Red, Rust (orange), and Matte Raw.
                                            </li>
                                            <li>
                                                Q: Is the Madera Pilot Front Hub warrantied?
                                            </li>
                                            <li>A: There is a manufacturer's warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.</li>
                                            <li>
                                                <h5>B. Profile Mini Front Hub.</h5>
                                            </li>
                                            <li>
                                                Q: What type of material is the center axle made from?
                                            </li>
                                            <li>
                                                A: The Mini front hub comes standard with an aluminum front
                                                internal female axle.
                                                The standard bolts are chromo 8mm allen head with aluminum
                                                volcano washers, but you can upgrade at no charge to 3/8
                                                chromo button head bolts or 3/8 17mm hex chromo button
                                                bolts.
                                                Tried and tested (for 14 years), the aluminum inner axle is
                                                incredibly durable. However, if you would rather have a
                                                steel option, we do offer chromo inner axles as well a 14mm
                                                chromo GHD version.
                                            </li>
                                            <li>
                                                Q: For what style of riding can I use this?
                                            </li>
                                            <li>A: Ramp, Street, and Race. Basically, anything.</li>
                                            <li>
                                                Q: What colors does the Mini Front Hub come in?
                                            </li>
                                            <li>
                                                A: Black, Matte Back, Polished, Red, Blue, Gold, Aqua,
                                                White, Green, Anti-freeze Green, Matte Army Green, and we do
                                                special colors every two months.
                                            </li>
                                            <li>
                                                Q: Is the Profile Mini Front Hub warrantied?
                                            </li>
                                            <li>
                                                A: There is a manufacturer's warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.
                                            </li>
                                            <li>
                                                <h5>C. Elite 20mm Front Hub.</h5>
                                            </li>
                                            <li>Q: What type of material is the center axle made from?</li>
                                            <li>
                                                A: The Elite 20mm front hub comes standard with an aluminum
                                                internal female axle.
                                                The standard bolts are aluminum 8mm allen head with aluminum
                                                button bolts.
                                            </li>
                                            <li>
                                                Q: For what style of riding can I use this?
                                            </li>
                                            <li>
                                                A: Race only.
                                            </li>
                                            <li>
                                                Q: What colors does the Elite 20mm front hub come in?
                                            </li>
                                            <li>
                                                A: Black, Matte Back, Polished, Red, Blue, Gold, Aqua,
                                                White, Green, and we do special colors every two months.
                                            </li>
                                            <li>
                                                Q: Is the Elite 20mm Front Hub warrantied?
                                            </li>
                                            <li>A: There is a manufacturer's warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.</li>
                                            <li>
                                                <h4>
                                                    D. Profile Elite/Totem Front Hub.
                                                </h4>
                                            </li>
                                            <li>
                                                Q: What type of material is the center axle made from?
                                            </li>
                                            <li>A: The Elite/Totem front hub comes standard with an aluminum
                                                front internal female axle.
                                                The standard bolts are chromo 8mm allen head with aluminum
                                                volcano washers, but you can upgrade at no charge to 3/8
                                                chromo button head bolts or 3/8 17mm hex chromo button
                                                bolts.
                                                Tried and tested (for 14 years), the aluminum inner axle is
                                                incredibly durable. However, if you would rather have a
                                                steel option, we do offer chromo inner axles as well a 14mm
                                                chromo GHD version.</li>
                                            <li>
                                                Q: What is the difference between the Totem Front and Elite
                                                Front?
                                            </li>
                                            <li>A: No difference!</li>
                                            <li>
                                                Q: For what style of riding can I use this?
                                            </li>
                                            <li>A: Ramp, Street, and Race. Basically, anything.</li>
                                            <li>
                                                Q: What colors does the Elite/Totem Front Hub come in?
                                            </li>
                                            <li>
                                                A: Black, Matte Back, Polished, Red, Blue, Gold, Aqua,
                                                White, Green, Matte Army Green, and we do special colors
                                                every two months.
                                            </li>
                                            <li>Q: Is the Profile Elite/Totem Front Hub warrantied?</li>
                                            <li>
                                                A: There is a manufacturer's warranty that covers any
                                                defects/machining issues straight out of the box.
                                                We do offer crash replacement pricing for most issues.
                                                Please contact our warranty department.
                                            </li>



                                        </ul>
                                        <img src="{{asset('images/Front-Mini-Hub-Spread-1-1024x590.jpg')}}"
                                             class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingsix">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsesix" aria-expanded="false"
                                                aria-controls="collapsesix">
                                            Q and A: Profile Hub Guard Guide
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapsesix" class="collapse" aria-labelledby="headingsix"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Recently we've had a lot of questions regarding our hub guards: how
                                            do you put them on, which one works for what hub, etc...

                                            We thought it best to break it down here:</p>
                                        <ul>
                                            <li>
                                                <h5>
                                                    <h5>A. Rear, non-drive Aegis Guard.</h5>
                                                </h5>
                                            </li>
                                            <li>
                                                Q: Which hub does it work on?
                                            </li>
                                            <li>
                                                A: Profile rear Mini, Totem and Elite, as well as Madera
                                                V-2.
                                            </li>
                                            <li>
                                                Q: Does it work on 3/8 and 14mm hubs?
                                            </li>
                                            <li>A: Yes.</li>
                                            <li>Q: How do I put the guard on my hub?</li>
                                            <li>
                                                <a href="#">A:
                                                    http://www.profileracing.com/2011/08/profile-aegis-hub-guard-installation-instructions/</a>
                                            </li>
                                            <li>
                                                <h4>B. Front, Aegis Guard.</h4>
                                            </li>
                                            <li>
                                                Q: Which hub does it work on?
                                            </li>
                                            <li>
                                                A: Profile front Mini, Totem and Elite, as well as Madera
                                                Pilot.
                                            </li>
                                            <li>Q: Does it work on 3/8 and 14mm hubs?</li>
                                            <li>
                                                <h5>B. Profile Mini Front Hub.</h5>
                                            </li>
                                            <li>
                                                A: Yes.
                                            </li>
                                            <li>
                                                Q: How do I put the guard on my hub?
                                            </li>
                                            <li>
                                                A: Goes on the same as the rear Aegis for 3/8 shown here:
                                                http://www.profileracing.com/2011/08/profile-aegis-hub-guard-installation-instructions/
                                            </li>
                                            <li>
                                                <h4>C. LHD Rear, drive-side Aegis Guard.</h4>
                                            </li>
                                            <li>
                                                Q: Which hub does it work on?
                                            </li>
                                            <li>
                                                A: Profile LHD rear Mini, Totem and Elite, as well as LHD
                                                Madera V-2.
                                            </li>
                                            <li>
                                                Q: Does it work on 3/8 and 14mm hubs?
                                            </li>
                                            <li>
                                                A: Yes.
                                            </li>
                                            <li>
                                                <h5>Q: How do I put the guard on my hub?</h5>
                                            </li>
                                            <li><a href="#">A:
                                                    http://www.profileracing.com/2012/06/installing-the-profile-drive-side-hubguard/</a>
                                            </li>
                                            <li>
                                                <h4>D. RHD Rear, drive-side Aegis Guard.</h4>
                                            </li>
                                            <li>
                                                Q: Which hub does it work on?
                                            </li>
                                            <li>
                                                A: Profile RHD rear Mini, Totem and Elite, as well as RHD
                                                Madera V-2.
                                            </li>
                                            <li>
                                                Q: Does it work on 3/8 and 14mm hubs?
                                            </li>
                                            <li>
                                                A: Yes.
                                            </li>
                                            <li>
                                                Q: How do I put the guard on my hub?
                                            </li>
                                            <li>A:
                                                http://www.profileracing.com/2012/06/installing-the-profile-drive-side-hubguard/
                                            </li>



                                        </ul>
                                        <img src="{{asset('images/Hub-Guard-Spread-1024x886.jpg')}}" class="img-fluid"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingseven">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseseven" aria-expanded="false"
                                                aria-controls="collapseseven">
                                            Q and A: What Spline Drive Sprocket will work for your
                                            application?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseseven" class="collapse" aria-labelledby="headingseven"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We've had several people ask the difference between each of our
                                            sprockets in our spline drive line.
                                            We thought it best to show a visual, and with it, to describe the
                                            specifications of each.</p>
                                        <ul>
                                            <li>
                                                <h5>
                                                    <h5>A. Nano 19mm spline drive sprocket.</h5>
                                                </h5>
                                            </li>
                                            <li>
                                                Used for flatland application. Used best on a 19mm No Boss
                                                Crank set but will work on a RHD/LHD 19mm Crank Set.

                                                Teeth width: 3/32

                                                Sizes: 20 and 22t
                                            </li>
                                            <li>
                                                Colors: Black, Polished, Red, Blue, Gold, Purple, and Green.
                                            </li>
                                            <li>
                                                <h5>B. 19mm spline drive sprocket.</h5>
                                            </li>
                                            <li>A: Yes.</li>
                                            <li>Q: How do I put the guard on my hub?</li>
                                            <li>
                                                Used for ramp and street application. Used best on a 19mm No
                                                Boss Crank set but will work on a RHD/LHD 19mm Crank Set.
                                            </li>
                                            <li>
                                                Teeth width: 1/8
                                            </li>
                                            <li>
                                                Sizes: 23, 25, 28, 30, 33, 36, 39, and 42t
                                            </li>
                                            <li>
                                                Colors: Black, Polished, Red, Blue, Gold, Purple, Aqua, and
                                                Green.
                                            </li>

                                            <li>
                                                <h5>C. Galaxy 22m spline drive sprocket</h5>
                                            </li>
                                            <li>
                                                Used for ramp and street application. Used best on 22mm No
                                                Boss Column Crank set.
                                            </li>
                                            <li>
                                                Teeth width: 1/8
                                            </li>
                                            <li>
                                                Sizes: 25, 28, and 30t
                                            </li>
                                            <li>
                                                Colors: Black, Polished, Red, Blue, and Gold.
                                            </li>
                                            <li>
                                                <h4>D. Sabre spline drive sprocket</h4>
                                            </li>
                                            <li>
                                                Used for ramp, race and street application. This sprocket is
                                                drilled for 4 separate inserts (sold separately). Each of
                                                the 4 inserts could adapt it to retro fit any 19mm or 22mm
                                                bolt-on or spline drive crank set.
                                            </li>
                                            <li>
                                                The insert options are:
                                                <br>
                                                1.19mm Bolt-on.
                                                <br>
                                                2.19mm spline drive
                                                <br>
                                                3.22mm Bolt-on
                                                <br>
                                                4.22mm spline drive
                                            </li>
                                            <li>
                                                Teeth width: 1/8 on 25 through 33t, 3/32 on 36 through 45t.
                                            </li>
                                            <li>
                                                Sizes: 25, 28, 30, 33, 36, 37, 38, 39, 40, 41, 42, 43, 44,
                                                and 45t.


                                            </li>
                                            <li>
                                                Colors: Black Only.
                                            </li>
                                            <li>
                                                <h5>E. Elite 19mm spline drive sprocket</h5>
                                            </li>
                                            <li>Used for race application. Used best on a 19mm No Boss Crank
                                                set but will work on a RHD/LHD 19mm Crank Set.
                                            </li>
                                            <li>
                                                Teeth width: 3/32
                                            </li>
                                            <li>
                                                Sizes: 36, 37, 38, 39, 40, 41, 42, 43, 44, and 45t
                                            </li>
                                            <li>
                                                Colors: Black, Polished, Red, Blue, and Gold.
                                            </li>

                                        </ul>
                                        <img src="{{asset('images/SPLINE-SPREAD-1024x948.jpg')}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingeigth">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseeigth" aria-expanded="false"
                                                aria-controls="collapseeigth">
                                            Q and A: Which hub axle should I choose?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseeigth" class="collapse" aria-labelledby="headingeigth"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Considering we make every hub axle here in our machine shop from
                                            scratch, we've been able to fill every option covering
                                            differences in riding style, durability, and aesthetic.</p>
                                        <p>Below are all of our options for both front and rear Profile Mini
                                            and Totem, and Madera Pilot and V-2 hubs.</p>
                                        <p>Hope this helps in making your next decision on what to get...</p>
                                        <p>Front Axle configurations.</p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="{{asset('images/Front-Axle-Spread-970x1024.jpg')}}"
                                                     class="img-fluid" alt="">
                                                <img src="{{asset('images/Rear-Axle-Spread-1024x695.jpg')}}"
                                                     class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>

                                                        A. 3/8 aluminum front axle: This is our standard
                                                        3/8
                                                        axle that 98% of riders use.
                                                        Our whole team uses this configuration which is
                                                        good
                                                        for no pegs, one or two pegs.
                                                    </li>
                                                    <li>
                                                        B. 3/8 steel front axle: For use with riders who
                                                        like
                                                        3/8 but are a little leery about riding an
                                                        aluminum
                                                        axle. This configuration is good for no pegs, one
                                                        or
                                                        two pegs.
                                                    </li>
                                                    <li>
                                                        C. 14mm chromo GDH axle: For use with riders who
                                                        are
                                                        very hard on the front wheel/pegs. If you've had a
                                                        history of breaking front axles from peg use, this
                                                        is
                                                        your best choice.
                                                    </li>
                                                    <li>
                                                        Rear Axle Configurations.
                                                    </li>
                                                    <li>
                                                        A. 3/8 aluminum rear axle: This is our standard
                                                        3/8
                                                        axle. Although you can ride pegs with this axle,
                                                        it is
                                                        mainly for race, trails, and peg-less street and
                                                        park.
                                                    </li>
                                                    <li>B. 3/8 steel rear axle: For use with riders who
                                                        like 3/8
                                                        but are a little leery about riding an aluminum
                                                        axle.
                                                        This configuration is good for no pegs, one or two
                                                        pegs.</li>
                                                    <li>
                                                        C. 14mm chromo solid axle: For use with riders who
                                                        are
                                                        very hard on the rear wheel/pegs. If you've had a
                                                        history of breaking rear axles from peg use, this
                                                        is
                                                        your best choice.</li>
                                                    <li>
                                                        D. 14mm chromo hollow GDH axle: This is our
                                                        standard
                                                        street/park axle. This is what 98% of riders use
                                                        and is
                                                        good for pretty much anything: street/park/trails.
                                                    </li>
                                                    <li>
                                                        E. 14mm titanium hollow GDH axle: This would be
                                                        the
                                                        best upgrade for heavy park use with keeping
                                                        things as
                                                        light weight as possible. Although you can use
                                                        this for
                                                        street, we would recommend a hollow chromo GDH or
                                                        solid
                                                        chromo axle.
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingnine">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsenine" aria-expanded="false"
                                                aria-controls="collapsenine">
                                            Q: Can you ride pegs on a Profile Mini Front hub? A: YES!
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapsenine" class="collapse" aria-labelledby="headingnine"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>The Profile Mini Hubs were originally released in 2001.</p>
                                        <p>Built originally for race application, the mini hubs were soon
                                            modified to accept a 14mm axle in the rear.</p>
                                        <p>However, the front, with an aluminum 3/8 inner axle, has not
                                            changed much since its inception.
                                            By 2002, the Mini Hubs became our primary freestyle ramp/street
                                            hub which can be used with pegs.
                                            By 2008, we released the Profile Totem and Madera Pilot front
                                            hubs. All of which take the same exact Mini aluminum axle with
                                            3/8 chromo bolts. These two additional front hubs can be ridden
                                            with pegs as well.</p>
                                        <p>Last Wednesday at the skatepark I was answering some questions from
                                            the locals. Within the questions, most of them were based around
                                            the ability to ride pegs on a front Profile Mini Hub. At that
                                            point, I realized that it might not be common knowledge.</p>
                                        <p>To better show the varieties of peg use, here is a photo selection
                                            of our riders' front wheels.
                                            If you can identify each riders wheel, you will be entered to win
                                            a selection of the three newest Profile logo shirts.</p>
                                        <p>Write in the rider's names next to the photo number associated with
                                            the front wheel and submit your answers to
                                            matt@profileracing.com. <b>MAKE SURE THE WORD "CONTEST" IS IN
                                                YOUR SUBJECT LINE.</b></p>
                                        <p>We will choose a winner by Friday 12/13.</p>
                                        <p>Thanks for the support.</p>
                                        <p>These are the riders' featured front wheel photos in random order:
                                            Grant Castelluzzo, Jared Eberwein, Mark Mulville, Chad DeGroot,
                                            Rob Diquattro, Dillon Leeper, Mike Meister, Matt Coplon and Ricky
                                            Moseley.</p>
                                        <img src="{{asset('images/2017-11-07_02-02-36-646x1024.jpgFront-Wheel-1-764x1024.jpg')}}"
                                             class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-2-838x1024.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-3-1024x680.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-4-768x1024.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-5-768x1024.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-6-1024x682.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-7-768x1024.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-8-1024x764.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/Front-Wheel-9-1024x1024.jpg')}}" class="img-fluid"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingten">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseten" aria-expanded="false"
                                                aria-controls="collapseten">
                                            Q & A: Can a spline drive sprocket/spider work on a crank arm
                                            with a spider boss?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseten" class="collapse" aria-labelledby="headingten"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Can a spline drive sprocket/spider work on a crank arm with a
                                            spider boss?</p>
                                        <p>Yes, it can.</p>

                                        <img src="{{asset('images/racearmsds_1000.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/racearmback_1000.jpg')}}" class="img-fluid" alt="">
                                        <P>If using a crank arm with a sprocket bolt boss, the boss will sit
                                            flush against the sprocket/spider. Just make sure you take out
                                            the spider bolt.
                                            With Profile spline drive sprockets/spiders, you can also match
                                            up (or "time") the crank's spider boss with recesses in the
                                            sprocket. Basically, the sprocket bolt boss will sit inside the
                                            cut out of the sprocket.</P>
                                        <P>Regardless of how you apply it, spline drive sprockets/spiders will
                                            work with any 19mm crank set with existing sprocket bolt bosses.
                                        </P>
                                        <img src="{{asset('images/sdsarmback_1000.jpg')}}" class="img-fluid" alt="">
                                        <img src="{{asset('images/nobosssdsside_1000.jpg')}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingeleven">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseeleven" aria-expanded="false"
                                                aria-controls="collapseeleven">
                                            Q and A: Do I need to grease my Profile cassette hub driver?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseeleven" class="collapse" aria-labelledby="headingeleven"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Definitely not!

                                        </p>
                                        <p>Cassette drivers are designed to run dry.</p>


                                        <P>The application of grease inside the driver can cause both the
                                            springs and pawls to engage improperly. Improper engagement could
                                            cause stress on these parts causing them to bend, break, and
                                            possibly chip away at the hub shell’s ratchet ring.
                                            Grease also attracts dirt. Dirt can gum up the works, causing a
                                            slow driver. Dirt could also potentially tear up your springs and
                                            pawls. Oily lubes also attract dirt, so they should be avoided as
                                            well.</P>
                                        <P>Teflon dry-film chain lube is OK to use on your rubber "O"-ring in
                                            cases of friction (aka. a slow driver). White Lightning is a very
                                            popular brand that's available at most bike shops.</P>
                                        <p>You can also apply a drop of Teflon dry-film chain lube to your
                                            pawls and pawl pockets to ease friction. It applies wet and dries
                                            to a thin lubricating film, but use it sparingly, as it will
                                            build up over time. Dry Graphite powder is also a great substance
                                            to keep your driver running smoothly.</p>
                                        <p>Lube with a small drop on the top of each pawl and a few drops on
                                            the driver seal</p>
                                        <p>Lube with a small drop at each pawl pocket.</p>
                                        <p>Keeping the internals of your hub dry will also maintain a loud
                                            cassette noise when freewheeling. You’ve got to love a loud hub!
                                        </p>
                                        <p>-Matt </p>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingetweleve">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseetweleve" aria-expanded="false"
                                                aria-controls="collapseetweleve">
                                            Q and A: Which Spindle do I need?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseetweleve" class="collapse" aria-labelledby="headingetweleve"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We get this question all the time. Here's all the details.

                                        </p>
                                        <p>Q: Which BB Spindle do I need for my new bike using the Profile
                                            Outboard Bearing Bottom Bracket?</p>


                                        <P>A: The Short Answer:</P>
                                        <ul>
                                            <li>
                                                If you have a Mid or a Spanish BB on your BMX Freestyle
                                                bike, you need the 5 5/8" spindle.
                                                If you have an American BB on almost any style of frame, you
                                                need the 5 5/8" spindle.
                                                If you are using the Outboard BB and the Spline Drive
                                                Sprocket, and you BB shell measures 68mm wide, you need the
                                                5 5/8" Spindle.
                                                If you are using the Outboard BB and the Spline Drive
                                                Sprocket, and you BB shell measures 73mm wide, you need the
                                                6" Spindle.
                                                If you want the narrowest Q factor possible with a 68mm BB
                                                shell, get the Internal BB and the 5 1/4" spindle. This is
                                                mostly for track (fixed gear) bikes.
                                            </li>
                                        </ul>
                                        <img src="{{asset('images/68mmmeasure_550.jpg')}}" class="img-fluid" alt="">
                                        <p>The Spline Drive Sprocket setup will leave you, if you've properly
                                            centered the spindle, 19mm on each end for the crank arms. The
                                            Spline Drive Spider is about 10mm thick, or about 1.5mm thicker
                                            than the Sprocket, meaning you'll have slightly over 18mm of
                                            spindle to hold your crank arms with. This is the minimum amount
                                            of spindle to properly support your crank arms. It doesn't hurt
                                            to have more spindle inserted into the crank bosses, but you
                                            should avoid having less.</p>
                                        <p>The 5 5/8" spindle is 143mm long- the 6" spindle is 154.6mm long,
                                            so with the 6" spindle and a 68mm bb shell, you would end up with
                                            about 24mm inserted into each crank boss- the splines in each
                                            crank boss measures 27.6mm.</p>
                                        <p>If you have a bike with a 73mm BB shell, as many Mountain Bikes do,
                                            you are definitely going to want the 6" spindle. I'll diagram
                                            that one up next time.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingefourteen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseefourteen" aria-expanded="false"
                                                aria-controls="collapseefourteen">
                                            Q and A: Is Madera made in the USA?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseefourteen" class="collapse" aria-labelledby="headingefourteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Yes.</p>
                                        <p>Madera componentry is made here in our factory on the same machines
                                            as Profile.
                                            It has the same craftsmanship, engineering, and design.</p>


                                        <P>The difference between Madera is solely aesthetic. Because we cut
                                            down on the Madera’s intricacies through production, the product
                                            line is less expensive for us to make. Therefore, Madera retails
                                            for much less than Profile.</P>

                                        <p>Here’s an example of the difference through production of hub
                                            shells.</p>
                                        <p>Madera V2 Cassette Hub Shell</p>
                                        <p>The Madera V-2 rear hub shell takes approximately 4 minutes to
                                            make. </p>
                                        <p>Profile Mini Hub Shell</p>
                                        <p>Although the Profile mini hub shell is made on the same machine,
                                            the scalloping (design in the center of the shell) demands more
                                            machine time. The Profile Mini hub takes approximately 6 minutes
                                            to make. More time in the machine equals more cost for us to
                                            make.</p>
                                        <p>Madera cranks, spline drive sprockets, and stems all fall into the
                                            same idea. More simplistic design work with absolutely no
                                            sacrifice in quality.</p>
                                        <p>-Matt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingefifteen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseefifteen" aria-expanded="false"
                                                aria-controls="collapseefifteen">
                                            Q and A: Are Profile Cranks Warrantied?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseefifteen" class="collapse" aria-labelledby="headingefifteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Profile started producing 3-piece cranks right in 1979. Since their
                                            introduction, Profile has offered a “Limited Lifetime Warranty”
                                            to the original purchaser.</p>
                                        <p>What does that mean?</p>


                                        <P>If you buy a set of Profile Cranks, inside the box is a warranty
                                            card. Fill it out, get it back here to Profile and we’ll put it
                                            on file.
                                            The warranty card will entitle the original purchaser to a
                                            lifetime warranty covering bending or breaking of either the
                                            crank arms or CrMo (steel) spindle (granted the damage has been
                                            done under normal riding conditions).

                                        </P>

                                        <p>If you do not have a warranty card on file, your receipt can also
                                            be used for a proof-of-purchase, so it’s a good idea to save both
                                            the stub of your warranty card, as well as your receipt.</p>
                                        <p>For more detailed information, please click on this link.</p>
                                        <p>Thanks for the support. </p>
                                        <p>-Matt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingesixteen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseesixteen" aria-expanded="false"
                                                aria-controls="collapseesixteen">
                                            Q and A: Can you ride pegs on a 3/8 Profile Mini Hub?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseesixteen" class="collapse" aria-labelledby="headingesixteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Profile Mini hub have been available since 2001. From the onset,
                                            starting with our team riders, pegs have been riding for both
                                            park and street on the 3/8 FRONT mini hub. Today, all of our team
                                            riders run Profile 3/8 front Mini or 3/8 front Totem Hubs and
                                            almost all of them ride pegs.
                                            We do recommend you putting on a hub guard when riding pegs.
                                            Although many hub guards will work, the Profile Aegis guard works
                                            best (as it substitutes your existing cone spacer).

                                        </p>


                                        <P>

                                            Above is a photo of Chad Degroot with an over tooth. All of your
                                            weight is applied on the front peg through this move: Chad has
                                            never broken a 3/8 bolt.
                                            If you are not comfortable riding 3/8 on your front hub, we do
                                            offer them in 14mm.
                                        </P>

                                        <p>With Rear 3/8 Profile mini hubs, we DO NOT RECOMMEND them for peg
                                            use.
                                            However, we do offer a 3/8, steel button head Peg Bolt that is
                                            made for peg use. This bolt can be bought separate or as an
                                            upgrade with the hub. The peg bolt adapts both your 14mm peg and
                                            14mm drop out for use with 3/8. </p>
                                        <p>As with the Profile Mini front hub, we also recommend riding a hub
                                            guard with the Profile Mini rear. Most hub guards will work,
                                            however, the Profile Aegis rear guard with work on 3/8 or 14mm,
                                            and substitutes your existing non-drive jam nut and cone.</p>
                                        <p>If you have any questions, please contact matt at profileracing.com
                                        </p>
                                        <p>Thanks,</p>
                                        <p>-Matt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingeseventeen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseeseventeen" aria-expanded="false"
                                                aria-controls="collapseeseventeen">
                                            Profile Aegis Hub Guard Installation Instructions
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseeseventeen" class="collapse" aria-labelledby="headingeseventeen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p>The Profile Aegis Hub guards replace the existing cones on your
                                            Profile Mini
                                            and Totem Hubs. They are also compatible with the V.2 Madera
                                            Pilot Front and
                                            Cassette Rear hubs. </p>


                                        <P>

                                            The Rear Aegis works with 3/8 or 14mm hubs. The Front
                                            Aegis is only compatible with 3/8 axles.
                                        </P>

                                        <h5>To install the Aegis on 3/8 hubs:</h5>

                                        <p>Remove the Axle bolt from the hub on the side you wish to install
                                            the
                                            hubguard (or on the non-drive side of rear hubs). </p>
                                        <p>Remove the cone spacer from the hub</p>
                                        <p>Slide the Aegis into place where the cone spacer was, and then
                                            re-insert the
                                            axle bolt. Put the wheel back on your bike, and go find something
                                            to grind. </p>
                                        <p>If the cone spacer is "stuck" on the axle, the easiest way to
                                            remove it is to remove the axle from the hub. With the bolt about
                                            halfway threaded into the non-drive side of the hub, and your
                                            wheel out of your frame, and the drive side bolt and washer
                                            completely removed, hit the non drive side bolt with a hammer
                                            until the drive side hub bearing and driver slide free of the
                                            hub. You should now have no problems removing the cone spacer.
                                            Re-assemble the hub according to the instructions HERE.</p>
                                        <h5>To install the Aegis on 14mm hubs:</h5>
                                        <p>Loosen and remove the axle nut and the non-drive-side locknut. You
                                            will need
                                            to have two wrenches, or you can secure the drive side of the
                                            hub- use your
                                            axle nut and tighten the drive side onto the outside of your
                                            frame dropout.</p>
                                        <h5>Remove the cone spacer.</h5>
                                        <p>Slide the Aegis onto the axle. The hub guard takes the place of
                                            both the
                                            cone spacer and the lock nut. Re-Install the wheel on your
                                            bicycle.</p>
                                        <p>If the cone spacer is "stuck" on the axle, the easiest way to
                                            remove it is to remove the axle from the hub. With the non-drive
                                            side locknut removed from the hub, and your wheel out of your
                                            frame, hit the non drive side axle carefully with a plastic or
                                            rubber mallet or hammer until the drive side hub bearing and
                                            driver slide free of the hub. Take especial care not to damage
                                            the threads of the axle if you use a metal hammer- placing a
                                            small block of wood on the end of of the axle and hitting it with
                                            the hammer is a great way to protect the axle. You should now
                                            have no problems removing the cone spacer. Re-assemble the hub
                                            according to the instructions HERE.</p>
                                        <p>More info can be found by watching this video:</p>
                                        <iframe
                                            src="https://player.vimeo.com/video/27137674?title=0&amp;byline=0&amp;portrait=0"
                                            width="500" height="281" frameborder="0"></iframe>
                                        <p>BMX Union Insight: Profile Racing Aegis Hubguard from Jeff Harrington on Vimeo.</p><p>As always, if you have additional questions, please give us a call or email.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
