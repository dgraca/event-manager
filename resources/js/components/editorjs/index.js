(function () {
    "use strict";
    $(".editor").each(function () {
        const el = this;
        let editor;
        editor = new EditorJS({
            holder: el,
            placeholder: 'Let`s write an awesome story!',
            tools: {
                header: {
                    class: Header,
                    config: {
                        placeholder: 'Enter a header',
                        levels: [1, 2, 3, 4, 5, 6],
                        defaultLevel: 3
                    }
                },
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: true,
                },
                list: {
                    class: List,
                    inlineToolbar: ['link', 'bold'],
                },
                embed: {
                    class: Embed,
                    inlineToolbar: true,
                    config: {
                        services: {
                            youtube: true,
                            coub: true
                        }
                    }
                },
                table: {
                    class: Table,
                    inlineToolbar: true,
                },
                image: {
                    class: ImageTool,
                    config: {
                        // You might want to configure your image endpoints, etc. here
                    }
                },
                linkTool: {
                    class: LinkTool,
                    config: {
                        endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching
                    }
                },
                marker: {
                    class: Marker,
                    shortcut: 'CMD+SHIFT+M'
                },
                quote: {
                    class: Quote,
                    inlineToolbar: true,
                    config: {
                        quotePlaceholder: 'Enter a quote',
                        captionPlaceholder: 'Quote\'s author',
                    },
                },
                code: {
                    class: CodeTool,
                    shortcut: 'CMD+SHIFT+D'
                },
                delimiter: Delimiter,
                inlineCode: {
                    class: InlineCode,
                    shortcut: 'CMD+SHIFT+C'
                },
                raw: RawTool,
                checklist: {
                    class: CheckList,
                    inlineToolbar: true,
                },
            },
            onReady: () => {
                console.log('Editor.js is ready to work!')
            },
            onChange: async () => {
                const editorData = await editor.save();
                console.log(editorData);
                const edjsParser1 = edjsParser();

                //let html = edjsParser1.parse(editorData);
                //console.log(html);
                const parser = new edjsParser();
                const html = parser.parse(editorData);
                console.log(html);
                document.getElementById('editorContent').value = html;
                // Sync the editor data back to the textarea
                //document.getElementById('editorContent').value = JSON.stringify(editorData);

            }
        });
    });
})();
