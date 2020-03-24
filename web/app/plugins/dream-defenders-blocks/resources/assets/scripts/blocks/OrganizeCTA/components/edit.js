/** @wordpress */
import { __ } from '@wordpress/i18n'
import { useEffect } from '@wordpress/element'

/**
 * Edit: Gallery CTA
 */
const edit = ({ attributes, setAttributes, className, isSelected }) => {
  useEffect(() => {
    setAttributes({ align: 'full' })
  }, [])

  return (
    <div className={`${className} alignwide`}>
      <div className="bg-white">
        <div className="block bg-fixed bg-center bg-no-repeat bg-cover cover pb-16">
          <div className="container mx-auto flex flex-wrap content-center">
            <h2 className="w-full text-4xl italic font-bold text-center text-black pt-12 pb-4">
              We have nothing to lose but our chains.
            </h2>
          </div>

          <div className="relative z-0 w-full mx-auto">
            <div className="container mx-auto max-w-64">
              <div className="bg-white">
                <div className="relative w-full bg-fixed h-128 bg-gradient-b-yellow-white-blue">
                  <div className="relative z-0 items-center justify-center w-4/5 py-8 mx-auto text-white bg-black md:relative lg:w-3/5 organize-form" style={{top: '50%'}}>
                    <h3 className="italic text-center text-white">
                      Join our mailing list
                    </h3>

                    <form className="flex flex-col w-4/5 mx-auto text-black space-between" action="#">
                      <input type="text" disabled className="focus:no-outline focus:border-1 focus:border-blue py-4 my-2 text-center text-black placeholder-gray-500 focus:shadow-inset transition transition-duration-2000 transition-all" placeholder="Enter your email here.." />
                      <button disabled type="submit" className="py-4 my-2 tracking-wider uppercase bg-white text-black-900 font-display font-bold text-2xl">
                        Sign up
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default edit
