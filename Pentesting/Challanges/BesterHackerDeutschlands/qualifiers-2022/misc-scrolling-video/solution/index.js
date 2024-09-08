const extractFrames = require('ffmpeg-extract-frames')
const path = require('path')
const fs = require('fs')
const Jimp = require('jimp')
const naturalCompare = require("natural-compare-lite")


async function extractStuff() {
    // export every second frame of dings.mov
    // create out folder if it doesn't exist
    if (!fs.existsSync(path.join(__dirname, 'out'))) fs.mkdirSync(path.join(__dirname, 'out'))
    console.log('extracting frames')
    await extractFrames({
        input: 'dings.mov',
        output: './out/dings-%d.png',
        every: 1,
    })
}

async function makeImageFromFrames(inFolder) {
    console.log('cropping frames')
    // select one row of pixels from all frames
    // and save it as a single image
    const images = fs.readdirSync(path.join(__dirname, inFolder))

    for (let image of images) {
        if (!image.includes('dings')) continue;
        console.log(`Cropping: ${image}`)
        const imagePath = path.join(inFolder, image)

        let imageCut = await Jimp.read(imagePath)
        let coords = {
            x: 1150,
            y: 400,
            w: 5,
            h: 300
        }
        imageCut.crop(coords.x, coords.y, coords.w, coords.h)
        // create out2 folder if it doesn't exist
        if (!fs.existsSync(path.join(__dirname, 'out2'))) fs.mkdirSync(path.join(__dirname, 'out2'))
        imageCut.write(path.join(__dirname, 'out2', image))
    }

}

async function putFramesTogether(inFolder) {
    console.log('putting frames together')
    const images = fs.readdirSync(path.join(__dirname, inFolder))
    // remove DS_Store from images array
    images.splice(images.indexOf('DS_Store'), 1)
    // sort images for number in string
    const sortedImages = images.sort((a, b) => naturalCompare(a, b))

    let imageAdd = await Jimp.read(path.join(inFolder, sortedImages[1]))

    var imageCanvas = await new Jimp(((sortedImages.length - 1) * imageAdd.bitmap.width), imageAdd.bitmap.height)

    let counter = 0
    for (let image of sortedImages) {
        if (!image.includes('dings')) continue;
        const imagePath = path.join(inFolder, image)
        let imageAdd = await Jimp.read(imagePath)
        // set start position to counter*imageAdd width
        console.log(`Adding: ${image} at ${counter * imageAdd.bitmap.width}`)
        await imageCanvas.composite(imageAdd, counter * imageAdd.bitmap.width, 0)
        counter++
    }

    await imageCanvas.write(path.join(__dirname, 'out.png'))
}


async function main() {
    await extractStuff()
    await makeImageFromFrames('out')
    await putFramesTogether('out2')
}

main()
