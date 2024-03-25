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
        members_3: []
    };


    await page.goto("https://www.profileracing.com/teams/world-team/", {'timeout': 99999999, waitUntil: 'domcontentloaded'});

    scraped_data["members_3"] = await page.evaluate(() => {
        let members = [];

        jQuery('.layers-masonry-column').each((i, item) => {
            let member = {};

            member["name"] = jQuery(item).find('.heading').text().trim();
            member["image"] = jQuery(item).find('.media-image').find('img').attr('src');
            member["instagram"] = jQuery(jQuery(item).find('.excerpt').find('a')[1]).attr('href');

            members.push(member);
        });

        return members;
    });

    console.log(scraped_data["members_3"]);
    await browser.close();

    fs.writeFile('members_3.json', JSON.stringify(scraped_data), 'utf8', (err) => {
        if (err) {
            console.error('Error writing to file:', err);
            return;
        }
        console.log('Data has been written to file successfully.');
    });
})();
