/** @wordpress */
import { __ } from "@wordpress/i18n";
import { TextareaControl } from "@wordpress/components";

/**
 * Edit EA block
 */
const edit = ({ className, attributes, setAttributes }) => {
  const { embed } = attributes;

  return (
    <div className={className}>
      <div className={`every-action-embed p-4 pt-6 w-full bg-gray-100`}>
        <TextareaControl
          value={embed ? embed : ""}
          label={__("Every Action embed code", "tiny-pixel")}
          onChange={(embed) => setAttributes({ embed })}
        />
      </div>
    </div>
  );
};

export default edit;
