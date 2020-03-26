
/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const {
    PanelBody,
    PanelRow,
    SelectControl,
    TextControl
} = wp.components;

const {
    InspectorControls
} = wp.editor; 

function getPages ( pages, selectedPages ) {
    let _pages = [];
    console.log(pages);

    for ( let index in pages ) {
        let page = pages[index];

        if (selectedPages) {
            var _index = selectedPages.indexOf( page.id.toString() );

            if ( _index >= 0 ) {
                let imageUrl = "";

                if (page.featured_image_src) {
                    imageUrl = page.featured_image_src[0];
                }

                if ( imageUrl != "" ) {
                    _pages.push(
                        <div className="col-md-4"> 
                            <img src={ imageUrl }/>
                            { page.title.rendered } 
                        </div>
                    )
                } else {
                    _pages.push(
                        <div className="col-md-3"> 
                            { page.title.rendered } 
                        </div>
                    )
                }
            }
        }
    }

    return _pages;
}

registerBlockType( 'andrewmurray/content-thumbnail-slider', {
    title: __( "Content Thumbnail Slider", "andrewmurray" ),
    category: 'common',
    icon: 'wordpress-alt',
    keywords: [
        __( 'Content', 'andrewmurray' ),
        __( 'Thumbnail', 'andrewmurray' ),
        __( 'Slider', 'andrewmurray' ),
    ], 
    category: 'widgets',
    attributes: {
    	pages: {
    		type: 'object'
    	},
    	selectedPages: {
    		type: 'array'
    	},
    },
    edit: props => {
        const { 
            attributes: { pages, selectedPages } 
        } = props;

    	if ( ! pages ) {
    		wp.apiFetch( {
				url: '/wp-json/wp/v2/pages?per_page=100'
			} ).then( pages => {
				props.setAttributes( {
					pages: pages
				} );
			} );
    	}

    	if ( ! pages ) {
    		return 'Loading...';
    	}

    	if ( pages && pages.length === 0 ) {
    		return 'No categirues found.. please add some!';
    	}

        const updatePages = value => {
           props.setAttributes( { selectedPages: value } );
        }

        let options = [];

        pages.map( page => {
            options.push({
                value: page.id,
                label: page.title.rendered
            });
        });
    
        let _pages = getPages( pages, selectedPages );

		return [
            <InspectorControls>
                <PanelBody
                    title={ __( 'Pages', 'andrewmurray' ) }
                >
                    <PanelRow>
                        <SelectControl
                            multiple
                            label={ __( 'Select pages', 'andrewmurray' ) }
                            value={ selectedPages }
                            options={ options }
                            onChange={ updatePages }
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>,

            <div className="row">
                { _pages }
            </div>
		]
    },
    save: function( ) {
        return null;
    }
} );