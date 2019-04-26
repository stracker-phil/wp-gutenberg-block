/**
 * Block dependencies
 */
import icon from './icon';
import './style.scss';
import './editor.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

/**
 * Register block
 */
export default registerBlockType(
    'pluginname/blockname',
    {
        title: __( 'Demo Block', 'wpblock' ),
        description: __( 'Block description.', 'wpblock' ),
        category: 'common',
        icon: {
          background: 'rgba(254, 243, 224, 0.52)',
          src: icon,
        },
        keywords: [
            __( 'Banner', 'wpblock' ),
            __( 'CTA', 'wpblock' ),
            __( 'Shout Out', 'wpblock' ),
        ],
        attributes: {
          message: {
              type: 'array',
              source: 'children',
              selector: '.message-body',
          }
        },
        edit: props => {
            const { attributes: { message }, className, setAttributes } = props;
            const onChangeMessage = message => { setAttributes( { message } ) };
            return (
                <div className={ className }>
                    <h2>{ __( 'Call to Action', 'wpblock' ) }</h2>
                    <RichText
                        tagName="ul"
                        multiline="li"
                        placeholder={ __( 'Add your custom message', 'wpblock' ) }
                      onChange={ onChangeMessage }
                      value={ message }
                  />
                  {
                    isSelected && (
                      <p className="sorry warning">{ __( '✋ You can edit the message above', 'wpblock' ) }</p>
                    )
                  }
                </div>
            );
        },
        save: props => {
            const { attributes: { message } } = props;
            return (
                <div>
                    <h2>{ __( 'Call to Action', 'wpblock' ) }</h2>
                    <div class="message-body">
                        { message }
                    </div>
                </div>
            );
        },
    },
);
