import { PostcodeLookup } from "https://cdn.jsdelivr.net/npm/@ideal-postcodes/postcode-lookup-bundled@2/dist/postcode-lookup.esm.js";
window.PostcodeLookup = PostcodeLookup;
PostcodeLookup.setup({
    apiKey: "ak_l96o294xFkm5IoleolP19eggRpQyX",
    context: "#context",
    outputFields: {
        line_1: "#line_1",
        line_2: "#line_2",
        line_3: "#line_3",
        post_town: "#post_town",
        postcode: "#postcode"
    }
});
