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
        bike_checks: []
    };
    let links = [
        'https://www.profileracing.com/dialing-it-in-with-bobby-proctor/',
        'https://www.profileracing.com/dialing-it-in-with-craig-stevens/',
        'https://www.profileracing.com/dialing-it-in-my-mike-saavedra/',
        'https://www.profileracing.com/dialing-it-in-with-grant-castelluzzo-2/',
        'https://www.profileracing.com/dialing-it-in-with-ryan-torrance/',
        'https://www.profileracing.com/dialing-it-in-with-shawn-bilslend/',
        'https://www.profileracing.com/dialing-it-in-with-chris-rivers/',
        'https://www.profileracing.com/dialing-it-in-with-daniel-dhers-the-edit/',
        'https://www.profileracing.com/dialing-it-in-with-ooti-billeaud/',
        'https://www.profileracing.com/dialing-it-in-with-mark-mulville/',
        'https://www.profileracing.com/dialing-it-in-with-ray-macdonald/',
        'https://www.profileracing.com/dialing-it-in-with-anthony-napolitan/',
        'https://www.profileracing.com/dialing-it-in-with-lance-mosley/',
        'https://www.profileracing.com/dialing-it-in-with-seth-bernard/',
        'https://www.profileracing.com/dialing-it-in-with-michael-graf/',
        'https://www.profileracing.com/dialing-it-in-with-josh-hayes/',
        'https://www.profileracing.com/dialing-it-in-with-paul-radosevich/',
        'https://www.profileracing.com/dialing-it-in-with-ricky-moseley/',
        'https://www.profileracing.com/dialing-it-in-with-dillon-leeper/',
        'https://www.profileracing.com/dialing-it-in-with-mike-nau/',
        'https://www.profileracing.com/dialing-it-in-with-jacob-hager/',
        'https://www.profileracing.com/dialing-it-in-with-kent-pearson/',
        'https://www.profileracing.com/dialing-it-in-with-hayden-copthorne/',
        'https://www.profileracing.com/dialing-it-in-with-adam-hauck/',
        'https://www.profileracing.com/dialing-in-in-with-dani-windhausen/',
        'https://www.profileracing.com/dialing-it-in-with-lucas-porzio/',
        'https://www.profileracing.com/dialing-it-in-with-steven-ricker/',
        'https://www.profileracing.com/dialing-it-in-with-greg-mundys-firemans-texas-cruiser/',
        'https://www.profileracing.com/dialing-it-in-with-ash-nau/',
        'https://www.profileracing.com/dialing-it-in-with-chris-przywara/',
        'https://www.profileracing.com/dialing-it-in-with-kaci-halahan/',
        'https://www.profileracing.com/matt-coplons-rig-check/',
        'https://www.profileracing.com/dialing-it-in-with-mat-olson/',
        'https://www.profileracing.com/dialing-it-in-with-zach-zeuschel/',
    ];
    for (const link of links) {
        await page.goto(link, {'timeout': 99999999, waitUntil: 'domcontentloaded'});

        //jQuery('.post-feature-thumbnail').length
        let bike_check = {};

        // let title_found = true;
        // await page.waitForSelector('.heading').then(() => {title_found = true;}).catch(() => {title_found = false;});
        // let image_found = true;
        // await page.waitForSelector('.post-feature-thumbnail').then(() => {image_found = true;}).catch(() => {image_found = false;});
        // let description_found = true;
        // await page.waitForSelector('.post-story').then(() => {description_found = true;}).catch(() => {description_found = false;});

        // if (title_found) {
            bike_check["title"] = await page.evaluate(() => {
                return jQuery('.heading').text();

                let items = [];
                jQuery('.layers-masonry-column').each((i, item) => {
                   items.push({
                       name: jQuery(item).find('.heading').text().trim(),
                       image: jQuery(item).find('img').attr('src'),
                       instagram: jQuery(item).find('a[target="_blank"]').attr('href'),
                   });
                });

                console.log(JSON.stringify(items));

                // jQuery('article').each((i, item) => {
                //     console.log(jQuery(item).find('.button').attr('href'));
                // });
            });
        // }

        // if (image_found) {
            bike_check["image"] = await page.evaluate(() => {
                return jQuery('.post-feature-thumbnail').find('img:first').attr('src');
            });
        // }

        // if (description_found) {
            bike_check["description"] = await page.evaluate(() => {
                return jQuery('.post-story').html();
            });
        // }

        console.log(bike_check);
        scraped_data.bike_checks.push(bike_check);

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

    fs.writeFile('bike_checks.json', JSON.stringify(scraped_data), 'utf8', (err) => {
        if (err) {
            console.error('Error writing to file:', err);
            return;
        }
        console.log('Data has been written to file successfully.');
    });
})();
