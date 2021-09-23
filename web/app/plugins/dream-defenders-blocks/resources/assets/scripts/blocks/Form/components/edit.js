/** @wordpress */
import { __ } from "@wordpress/i18n";
import { useEffect } from "@wordpress/element";
import {
  InnerBlocks,
  InspectorControls,
  RichText,
} from "@wordpress/block-editor";

/** components */
import TextColumnsPanel from "./panels/text-columns";

const edit = ({ className, attributes, setAttributes, isSelected }) => {
  const { textColumns } = attributes;

  useEffect(() => {
    setAttributes({ align: "full" });
  });

  const onTextColumns = (textColumns) => setAttributes({ textColumns });

  return (
    <>
      <InspectorControls>
        <TextColumnsPanel
          textColumns={textColumns}
          onTextColumns={onTextColumns}
        />
      </InspectorControls>

      <div className={className}>
        <section
          className="bg-fixed bg-no-repeat bg-cover background-flowing"
          style={{
            backgroundImage: `url('/app/themes/sage/dist/images/background-flowing.jpg')`,
            backgroundPosition: `40% 20%`,
          }}
        >
          <div className="px-4 pb-16 bg-white-800">
            <div className="container">
              <div className="flex flex-col justify-between px-4 py-16 mx-auto md:flex-row">
                <div className="w-full px-2 pr-8 mb-8 md:w-3/5">
                  <RichText
                    tagName={`div`}
                    placeholder={`Insert heading here.`}
                    className={`inline-block leading-none text-4xl md:text-5xl font-display uppercase text-black-900`}
                    value={attributes.heading && attributes.heading}
                    onChange={(value) => setAttributes({ heading: value })}
                  />

                  <div
                    className={
                      textColumns &&
                      `col-count-1 sm:col-count-2 md:col-count-1 lg:col-count-2 xl:col-count-3 col-gap-md`
                    }
                  >
                    <RichText
                      tagName={`div`}
                      className={`font-sans text-md`}
                      placeholder={`Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.`}
                      value={attributes.text && attributes.text}
                      onChange={(value) => setAttributes({ text: value })}
                    />
                  </div>
                </div>

                <div className="w-full md:w-2/5">
                  <div className="content-center w-full shadow:md transition-all transition transition-duration-2000 hover:shadow-epic bg-black-900">
                    <div
                      className={`text-white w-full font-sans inline-block p-4 text-sm`}
                    >
                      <span className="inline-block pb-0 mb-0 font-sans text-sm text-white w-100">
                        Copy/paste embed code here.
                      </span>
                      <InnerBlocks
                        templateLock={true}
                        template={[["core/html"]]}
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </>
  );
};

export default edit;
