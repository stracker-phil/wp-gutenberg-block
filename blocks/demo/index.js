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
        edit: props => {
          const { className, isSelected } = props;
          return (
            <div className={ className }>
              <h2>{ __( 'Static Call to Action', 'wpblock' ) }</h2>
              <p>{ __( 'This is really important!', 'wpblock' ) }</p>
              {
                isSelected && (
                  <p className="sorry warning">{ __( '✋ Sorry! You cannot edit this block ✋', 'wpblock' ) }</p>
                )
              }
            </div>
          );
        },
        save: props => {
          return (
            <div>
              <h2>{ __( 'Call to Action', 'wpblock' ) }</h2>
              <p>{ __( 'This is really important!', 'wpblock' ) }</p>
            </div>
          );
        },
    },
);
