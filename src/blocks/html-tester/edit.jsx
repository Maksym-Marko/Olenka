import { __ } from '@wordpress/i18n'; 
import { useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';

export default function Edit({ attributes, setAttributes }) {

  const blockProps = useBlockProps();

  return (
    <div {...blockProps}>      
      <ServerSideRender
        block={metadata.name}
        attributes={attributes}
      />
    </div>
  );
}
