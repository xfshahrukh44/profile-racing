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
        newss: []
    };
    let links = [
        'https://www.profileracing.com/sem-kok-fingers-crossed-bike-check-freedom-bmx/',
        'https://www.profileracing.com/profiles-tech-tuesday-looking-for-19mm-160mm-profile-cranks-on-a-budget/',
        'https://www.profileracing.com/a-sliver-of-concrete-in-the-indian-ocean-sebastian-grubinger-profile-bmx/',
        'https://www.profileracing.com/jams-profile-is-a-proud-supporter-get-involved/',
        'https://www.profileracing.com/aqua-mini-hubs-back-in-stock/',
        'https://www.profileracing.com/new-legacy-tiger-camo-and-military-green-5-panel-hats/',
        'https://www.profileracing.com/jared-eberwein-wheels-squared-comes-to-life/',
        'https://www.profileracing.com/spoke-and-word-episode-2-predicting-the-apollo-11-launch-an-iron-maiden-toilet-and-mark-mulville/',
        'https://www.profileracing.com/chur-the-dogs-the-halahans-in-nz-profile-bmx-dig-bmx/',
        'https://www.profileracing.com/from-dawn-till-dusk-big-island-vibes-jared-eberwein/',
        'https://www.profileracing.com/profiles-celebration-of-23-years-of-the-profile-mini-hub/',
        'https://www.profileracing.com/pre-order-for-the-from-the-dungeon-zip-hoodies/',
        'https://www.profileracing.com/terry-adams-and-the-abfl-series/',
        'https://www.profileracing.com/things-behind-the-things-episode-1-5-the-thing-behind-the-things/',
        'https://www.profileracing.com/one-love-jam-2024-highlights/',
        'https://www.profileracing.com/5-on-5-with-mickey-gaidos/',
        'https://www.profileracing.com/82460-2/',
        'https://www.profileracing.com/andrew-lazaruk-bike-check-profile-x-united-x-timeless-bmx-distro/',
        'https://www.profileracing.com/eci-tv-episode-63-profiles-elite-al-cranks/',
        'https://www.profileracing.com/the-wheelmills-winter-welcome-jam-profile-is-a-proud-sponsor/',
        'https://www.profileracing.com/profiles-5-on-5-with-cory-foust/',
        'https://www.profileracing.com/terry-adams-running-is-my-new-passion-connecting-his-feet-to-flat/',
        'https://www.profileracing.com/the-profile-nova-stem-vs-the-profile-helm-stem/',
        'https://www.profileracing.com/skatepark-of-tampas-fall-brawl-hosted-by-profile-racing/',
        'https://www.profileracing.com/profile-labelled-beanies-in-stock/',
        'https://www.profileracing.com/profile-tarpon-tees-available-in-off-white-on-black/',
        'https://www.profileracing.com/shanes-day-episode-11-next-generation-foster-bike-park-jam/',
        'https://www.profileracing.com/charm-city-mash-up-with-dillon-and-shane-leeper-dan-conway-and-dave-zovko/',
        'https://www.profileracing.com/set-ups-with-dylan-kakowski/',
        'https://www.profileracing.com/the-bloom-bmx-calendar-profile-is-a-proud-sponsor/',
        'https://www.profileracing.com/cranksgiving-9-dc-november-28th/',
        'https://www.profileracing.com/fall-brawl-at-skatepark-of-tampa-december-2nd/',
        'https://www.profileracing.com/profile-whippet-sprocket-back-after-25-years/',
        'https://www.profileracing.com/chad-powers-2023-bike-check/',
        'https://www.profileracing.com/profiles-5-on-5-conversations-with-our-crew-kent-pearson/',
        'https://www.profileracing.com/limited-edition-profile-vintage-trucker-hats-available-now/',
        'https://www.profileracing.com/chad-degroot-bike-check-with-brant-moore/',
        'https://www.profileracing.com/set-ups-with-chris-childs-and-circuit-bmx/',
        'https://www.profileracing.com/inside-profile-racing-crank-laser-etching-fixture/',
        'https://www.profileracing.com/1600-miles-to-saskatoon-andrew-lazaruk-carson-donovan-timeless-bmx-distro/',
        'https://www.profileracing.com/profiles-tech-tuesday-elite-freewheel-spring-and-pawl-installation/',
        'https://www.profileracing.com/the-wheelmill-jam-october-27th/',
        'https://www.profileracing.com/clayton-bikes-jam-october-28th/',
        'https://www.profileracing.com/barnett-park-jam-profile-x-deco-x-mr-bikes-and-boards/',
        'https://www.profileracing.com/callsign-carolina-gallery-dig-bmx-snaps-by-dan-dellorso/',
        'https://www.profileracing.com/weather-it-aint-chased-by-rain-in-richmond-the-leepers-dellorso-and-tylee/',
        'https://www.profileracing.com/inside-profile-racing-new-3-8s-to-14mm-volcano-cones/',
        'https://www.profileracing.com/terry-adams-20-years-on-redbull-congrats/',
        'https://www.profileracing.com/kaci-halahans-summer-sunset-profile-color-way-is-available-now/',
        'https://www.profileracing.com/profiles-callsign-carolina-edit/',
        'https://www.profileracing.com/profiles-tech-tuesday-spring-and-pawl-installation-bmx-and-mtb/',
        'https://www.profileracing.com/rec-rats-babh-profile/',
        'https://www.profileracing.com/profiles-5-on-5-conversations-with-our-crew-billy-woodfin/',
        'https://www.profileracing.com/points-of-engagement-profiles-55th-anniversary-a-crew-mixer-section-3/',
        'https://www.profileracing.com/points-of-engagement-profiles-55th-anniversary-a-crew-mixer-sections-1-2/',
        'https://www.profileracing.com/terry-adams-nora-cup-nomination-flatland-rider-of-the-year/',
        'https://www.profileracing.com/nate-halahan-nora-cup-nomination-trail-rider-of-the-year/',
        'https://www.profileracing.com/flatland-assassins-battleground-comp-9-22-through-9-24/',
        'https://www.profileracing.com/end-of-summer-jam-jersey-city-september-16th/',
        'https://www.profileracing.com/gnarbq-september-23rd/',
        'https://www.profileracing.com/inside-profile-racing-44t-imperial-sprocket-production/',
        'https://www.profileracing.com/inside-profile-racing-elite-gusset-production-on-our-edm-machine/',
        'https://www.profileracing.com/rec-rats-jam-supported-by-profile-sunday-9-24/',
        'https://www.profileracing.com/barnett-jam-hosted-by-mr-bikes-and-boards-and-profile/',
        'https://www.profileracing.com/rise-and-grind-mr-bikes-and-boards-supported-by-profile-racing/',
        'https://www.profileracing.com/profiles-5-on-5-with-chad-degroot/',
        'https://www.profileracing.com/69474-2/',
        'https://www.profileracing.com/a-plastic-front-hub-matt-coplons-custom-profile-x-out-to-cruise-x-deco-build/',
        'https://www.profileracing.com/inside-profile-racing-american-cup-production/',
        'https://www.profileracing.com/carlos-gomez-tm-profile-europe-bike-check/',
        'https://www.profileracing.com/abacoa-jam-july-26th-jupiter-florida/',
        'https://www.profileracing.com/terry-adams-today-im-40/',
        'https://www.profileracing.com/chris-childs-built-different-sandm-bikes/',
        'https://www.profileracing.com/shanes-day-episode-10-the-rumble/',
        'https://www.profileracing.com/out-to-cruise-clowning-around-sessions-dan-dellorso-and-crew/',
        'https://www.profileracing.com/deco-2023-rebuilding-edit/',
        'https://www.profileracing.com/timeless-jam-august-19th-nelson-bc/',
        'https://www.profileracing.com/the-riveter-jump-jam-for-cat-man-august-5th-asheville-nc/',
        'https://www.profileracing.com/cornhuckit-jam-september-23rd-unadilla-nebraska/',
        'https://www.profileracing.com/bullshittin-on-the-backyard-5/',
        'https://www.profileracing.com/a-tight-spot-the-profile-crew-at-animal-hq-woodfin-the-keepers-and-conway/',
        'https://www.profileracing.com/finale-heresy-bmx/',
        'https://www.profileracing.com/mickey-gaidos-profile-zcoaster-unboxing/',
        'https://www.profileracing.com/in-the-cut-postcards-from-ohio-outtakes-dig-bmx/',
        'https://www.profileracing.com/possibly-the-most-popular-stem-in-bmx-still-pushin-mark-mulville-and-the-profile-push-stem/',
        'https://www.profileracing.com/the-hang-five-podcast-with-chad-degroot/',
        'https://www.profileracing.com/ocoee-jam-hosted-by-chad-degroot-and-mr-bikes-and-boards-july-8th/',
        'https://www.profileracing.com/next-gen-jam-august-26th-mullaly-bike-park/',
        'https://www.profileracing.com/road-to-recovery-jam-july-16th-trumbull-ct/',
        'https://www.profileracing.com/poynter-bros-new-castle-park-phase-two-jam/',
        'https://www.profileracing.com/degroot-and-mr-bikes-and-boards-summer-2023/',
        'https://www.profileracing.com/timeless-jam-july-15th-penticton-bc-canada/',
        'https://www.profileracing.com/the-peoples-jam-akron-ohio-july-22nd/',
        'https://www.profileracing.com/profiles-postcards-from-ohio-conway-woodfin-and-the-leepers/',
        'https://www.profileracing.com/the-rowan-roast-fayetteville-nc/',
        'https://www.profileracing.com/duda-penso-profile-x-gt-bmx-freestyle-bike-check-up/',
        'https://www.profileracing.com/profiles-tech-tuesday-drop-out-conversion-washers-for-our-bmx-hubs/',
        'https://www.profileracing.com/radshares-rumble-in-richmond-in-the-cut-2023/',
        'https://www.profileracing.com/inside-profile-racing-14mm-chromo-gdh-axle-production/',
        'https://www.profileracing.com/mickey-gaidos-watch-out-for-robots/',
        'https://www.profileracing.com/profile-oval-track-tees-available-for-pre-order/',
        'https://www.profileracing.com/profile-pa-crawl-with-conway-the-keepers-tylee-and-zovko/',
        'https://www.profileracing.com/the-return-of-the-profile-whippit-sprocket/',
        'https://www.profileracing.com/inside-profile-racing-cog-lock-rings/',
        'https://www.profileracing.com/reds-bmx-reds-a-palooza-springfield-mo-june-10th/',
    ];
    for (const link of links) {
        await page.goto(link, {'timeout': 99999999, waitUntil: 'domcontentloaded'});

        //jQuery('.post-feature-thumbnail').length
        let news = {};

        // let title_found = true;
        // await page.waitForSelector('.heading').then(() => {title_found = true;}).catch(() => {title_found = false;});
        // let image_found = true;
        // await page.waitForSelector('.post-feature-thumbnail').then(() => {image_found = true;}).catch(() => {image_found = false;});
        // let description_found = true;
        // await page.waitForSelector('.post-story').then(() => {description_found = true;}).catch(() => {description_found = false;});

        news["title"] = await page.evaluate(() => {
            return jQuery('.heading').text();
        });
        news["image"] = await page.evaluate(() => {
            return jQuery('.post-feature-thumbnail').find('img:first').attr('src');
        });

        news["description"] = await page.evaluate(() => {
            return jQuery('.post-story').html();
        });

        news["created_at"] = await page.evaluate(() => {
            return jQuery('.meta-date:first').text().trim();
        });

        console.log(news);
        scraped_data.newss.push(news);

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

    fs.writeFile('newss.json', JSON.stringify(scraped_data), 'utf8', (err) => {
        if (err) {
            console.error('Error writing to file:', err);
            return;
        }
        console.log('Data has been written to file successfully.');
    });
})();
