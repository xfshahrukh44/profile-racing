import puppeteer from 'puppeteer';
// import * as data from './step_1_category_links.json' assert { type: "json" };
import fs from 'fs';


(async () => {
    // Launch the browser and open a new blank page
    const browser = await puppeteer.launch({headless: false});
    const page = await browser.newPage();

    // Set screen size
    await page.setViewport({width: 900, height: 1080});

    let scraped_data = {
        how_tos: []
    };
    let links = [
        'https://www.profileracing.com/nate-halahan-nora-cup-nomination-trail-rider-of-the-year/',
        'https://www.profileracing.com/profile-chain-alignment-specifications/',
        'https://www.profileracing.com/tech-tip-48-profile-zcoaster-faqs/',
        'https://www.profileracing.com/tech-tip-47-profile-zcoaster-rebuild-tutorial/',
        'https://www.profileracing.com/profile-elite-rear-bmx-hub-everything-you-need-to-know/',
        'https://www.profileracing.com/profiles-elite-bmx-disk-hub-all-you-need-to-know/',
        'https://www.profileracing.com/tech-tip-46-sprocket-size-to-spindle-compatible/',
        'https://www.profileracing.com/profiles-tech-tip-45-what-is-in-a-profile-mini-rear-hub-14mm/',
        'https://www.profileracing.com/profiles-tech-tip-44-what-is-in-a-profile-zcoaster/',
        'https://www.profileracing.com/profiles-tech-tip-43-rim-size-versus-tire-size/',
        'https://www.profileracing.com/profiles-tech-tip-42-all-you-need-to-know-about-maderas-mast-stem/',
        'https://www.profileracing.com/profiles-tech-tip-41-hub-guards-the-whole-range/',
        'https://www.profileracing.com/profiles-tech-tip-40-profile-and-madera-hub-spoke-calculator/',
        'https://www.profileracing.com/profiles-tech-tip-39-how-to-use-a-profile-crank-tool/',
        'https://www.profileracing.com/profiles-tech-tip-38how-to-measure-the-q-factor-for-profile-race-cranks/',
        'https://www.profileracing.com/profiles-tech-tip-37-classic-19mm-vs-22mm-column-cranks/',
        'https://www.profileracing.com/profiles-tech-tip-35-profile-elite-mtb-1011-speed-conversion-kits-135mm-to-142-x-12mm/',
        'https://www.profileracing.com/profiles-tech-tip-34-whats-up-with-my-zcoasters-driver-support-bearing/',
        'https://www.profileracing.com/profiles-tech-tip-33-profile-ratchet-rings/',
        'https://www.profileracing.com/profiles-tech-tip-32-what-is-in-my-rear-elite-mtb-hub/',
        'https://www.profileracing.com/profiles-tech-tip-31-spline-drive-differential-race/',
        'https://www.profileracing.com/profiles-tech-tip-30-spline-drive-differential-freestyle/',
        'https://www.profileracing.com/profiles-tech-tip-29-mind-the-gap-converting-your-axle-from-14mm-to-38/',
        'https://www.profileracing.com/profiles-tech-tip-28-what-puts-the-elite-in-our-elite-cranks/',
        'https://www.profileracing.com/profiles-tech-tip-27-what-goes-around-best-chainring-bolts-for-profile-spider-and-ring-combo/',
        'https://www.profileracing.com/profiles-tech-tip-26-whats-the-difference-madera-versus-profile/',
        'https://www.profileracing.com/profiles-tech-tip-25-weight-what-comparing-titanium-to-chromo/',
        'https://www.profileracing.com/profiles-tech-tip-24-profiles-warranty-policy/',
        'https://www.profileracing.com/profiles-tech-tip-23-2-years-on-the-profile-zcoaster-with-dillon-leeper/',
        'https://www.profileracing.com/tech-tip-22-a-clean-hub-is-a-happy-hub/',
        'https://www.profileracing.com/tech-tip-21-three-advantages-of-riding-the-profile-zcoaster-with-dillon-leeper/',
        'https://www.profileracing.com/profiles-tech-tip-20-freewheelin-what-makes-profiles-elite-freewheel-one-of-the-best/',
        'https://www.profileracing.com/profiles-tech-tip-19-profiles-worldwide-service/',
        'https://www.profileracing.com/profiles-tech-tip-18-profile-mini-rear-38-hub-assembly/',
        'https://www.profileracing.com/profiles-tech-tip-17-profile-mini-rear-14mm-hub-assembly/',
        'https://www.profileracing.com/profiles-tech-tip-16-profile-mini-front-hub-assembly/',
        'https://www.profileracing.com/profile-tech-tip-14-38-hub-bolt-options/',
        'https://www.profileracing.com/profile-tech-tip-13-how-to-convert-a-profile-minimadera-v2-from-14mm-to-38/',
        'https://www.profileracing.com/profiles-tech-tip-13-correct-spindle-lengths-for-inboard-and-outboard-euro-bottom-brackets-2/',
        'https://www.profileracing.com/profiles-tech-tip-12-what-is-a-profile-no-boss-crank/',
        'https://www.profileracing.com/profile-tech-tip-11-what-drives-you/',
        'https://www.profileracing.com/profiles-tech-tip-10-headset-fork-and-stem-installation/',
        'https://www.profileracing.com/profiles-tech-tip-9-crank-installation/',
        'https://www.profileracing.com/profile-tech-tip-8-stem-installation/',
        'https://www.profileracing.com/profiles-tech-tip-7-how-many-teeth-do-you-need/',
        'https://www.profileracing.com/profiles-tech-tip-6-on-guard/',
        'https://www.profileracing.com/profiles-tech-tip-5-front-hubs-which-one-works-best-for-freestyle-with-which-axle-and-what-bolts/',
        'https://www.profileracing.com/profiles-tech-tip-4-push-versus-acoustic/',
        'https://www.profileracing.com/tech-tip-3-what-is-going-overboard/',
        'https://www.profileracing.com/tech-tip-2-crank-it-down/',
        'https://www.profileracing.com/tech-tip-1-cut-me-some-slack/'
    ];
    for (const link of links) {
        await page.goto(link, {'timeout': 99999999, waitUntil: 'domcontentloaded'});

        //jQuery('.post-feature-thumbnail').length
        let how_to = {};

        let title_found = true;
        // await page.waitForSelector('.heading').then(() => {title_found = true;}).catch(() => {title_found = false;});
        let image_found = true;
        // await page.waitForSelector('.post-feature-thumbnail').then(() => {image_found = true;}).catch(() => {image_found = false;});
        let description_found = true;
        // await page.waitForSelector('.post-story').then(() => {description_found = true;}).catch(() => {description_found = false;});

        if (title_found) {
            how_to["title"] = await page.evaluate(() => {
                return jQuery('.heading').text();
            });
        }

        if (image_found) {
            how_to["image"] = await page.evaluate(() => {
                return jQuery('.post-feature-thumbnail').find('img:first').attr('src');
            });
        }

        if (description_found) {
            how_to["description"] = await page.evaluate(() => {
                return jQuery('.post-story').html();
            });
        }

        console.log(how_to);
        scraped_data.how_tos.push(how_to);

        //
        // let used_hrefs = [];
        // for (var i = 0; i < scraped_data["child_sub_categories"].length; i++) {
        //     for (var j = 0; j < scraped_data["child_sub_categories"][i]["products"].length; j++) {
        //         let link = scraped_data["child_sub_categories"][i]["products"][j];
        //         let category_name = scraped_data["child_sub_categories"][i]["name"];
        //         if (string_is_in_array(link, used_hrefs)) {
        //             delete scraped_data["child_sub_categories"][i]["products"][j];
        //         } else {
        //             used_hrefs.push(scraped_data["child_sub_categories"][i]["products"][j]);
        //         }
        //     }
        // }
    }

    await browser.close();

    fs.writeFile('how_tos.json', JSON.stringify(scraped_data), 'utf8', (err) => {
        if (err) {
            console.error('Error writing to file:', err);
            return;
        }
        console.log('Data has been written to file successfully.');
    });
})();
